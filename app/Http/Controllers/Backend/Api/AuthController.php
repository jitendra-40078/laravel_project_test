<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use App\Http\Controllers\Backend\Api\Validators\Auth as AuthValidator;
use App\Utility\ApiResponse;
use App\Models\Admin;

use App\Utility\Logs\AdminLogs;

class AuthController extends Controller
{
  /**
   *  @api - Admin Login
   *  @url - /api/cms/auth/login
   *  @author - Amit Kashte
   *  @function - function to verify admin credentials and establish session
   */
  public function login(Request $request){
    try{

      Auth::shouldUse('admin');

      $rules = AuthValidator::rules();
      $messages = AuthValidator::messages();

      $validator = Validator::make($request->all(), $rules, $messages);
  
      if ($validator->fails()) {
        return ApiResponse::validateError($validator->errors());
      }
  
      $validatedData = $validator->validated();
      $credentials = [
        "username" => $validatedData['username'],
        "password" => $validatedData['password']
      ];

      $admin = Admin::select('id', 'name', 'status', 'attempts', 'is_blocked', 'unblock_at')
                      ->where('username', $validatedData['username'])
                      ->first();

      if( !$admin ){
        return ApiResponse::alertBox(422, 'alertBox', 'error', 'credentialsNotMatched');
      }

      // if admin account is deactive
      if($admin->status && $admin->status === "D"){
        return ApiResponse::alertBox(422, 'alertBox', 'error', 'accountSuspended');
      }
      
      // if admin account is blocked
      if( $admin->is_blocked && $admin->is_blocked === "Y" ){
        $unblockAt = Carbon::parse($admin->unblock_at); 
        $currentDate = Carbon::now();

        if ($currentDate->greaterThan($unblockAt)) {
          $admin->is_blocked = 'N';
          $admin->unblock_at = null;

          $admin->save();
        } else {
          return ApiResponse::alertBox(422, 'alertBox', 'error', 'maxAttempts');
        }
      }
                
      // check login attempts & block user account
      $attempts = $admin->attempts ?? 0;
      if( $attempts >= 3 ){
        $unblockTime = Carbon::now()->addMinute(15);

        $admin->attempts = 0;
        $admin->is_blocked = 'Y';
        $admin->unblock_at = $unblockTime;
  
        $admin->save();

        AdminLogs::logActivity('AUTHENTICATION MAX ATTEMPTS', 'Http/Controllers/Backend/Api/AuthController@login', [
          'ip' => $request->header('X-Forwarded-For') ?? $request->ip(),
          'name' => $admin->name,
          'expiry' => $unblockTime
        ]);

        return ApiResponse::alertBox(422, 'alertBox', 'error', 'maxAttempts');
      }

      if(Auth::guard('admin')->attempt($credentials)){
        $admin->attempts = 0;
        $admin->is_blocked = 'N';
        $admin->save();
        
        AdminLogs::logActivity('AUTHENTICATION SUCCESS', 'Http/Controllers/Backend/Api/AuthController@login', [
          'ip' => $request->header('X-Forwarded-For') ?? $request->ip(),
          'name' => $admin->name,
        ]);

        return ApiResponse::redirect(200, 'dashboard');
      }else{
        $admin->attempts = $attempts + 1;
        $admin->save();
        
        return ApiResponse::alertBox(422, 'alertBox', 'error', 'credentialsNotMatched');
      }
    }
    catch(\Throwable $e){
      AdminLogs::logError('AUTHENTICATION FAILED', 'Http/Controllers/Backend/Api/AuthController@login', $e);
      return ApiResponse::alertBox(422, 'alertBox', 'error', 'failureMsg');
    }
  }

  /**
   *  @api - Admin Logout
   *  @url - /api/cms/auth/logout
   *  @author - Amit Kashte
   *  @function - function to destroy admin session
   */
  public function logout(Request $request){
    try{
      $name = Auth::guard('admin')->user()->name;

      Auth::guard('admin')->logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      AdminLogs::logActivity('LOGOUT SUCCESS', 'Http/Controllers/Backend/Api/AuthController@logout', [
        'ip' => $request->header('X-Forwarded-For') ?? $request->ip(),
        'name' => $name
      ]);

      return redirect()->route('cms.auth.login');
    }
    catch(\Throwable $e){
      AdminLogs::logError('LOGOUT FAILED', 'Http/Controllers/Backend/Api/AuthController@logout', $e);
    }
  }
}
