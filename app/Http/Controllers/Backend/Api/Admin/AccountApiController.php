<?php

namespace App\Http\Controllers\Backend\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Http\Controllers\Backend\Api\Validators\Admin\Account as AccountValidator;
use App\Utility\ApiResponse;

use App\Models\Admin;
use App\Utility\Logs\AdminLogs;
use App\Utility\Protection;
use Illuminate\Support\Facades\Hash;

class AccountApiController extends Controller
{

  /**
   *  @api - Admin profile update
   *  @url - /api/cms/profile/update
   *  @author - Amit Kashte
   *  @function - function to update admin profile details
   */
  public function profileUpdate(Request $request){

    if (Auth::guard('admin')->check()) {

      $adminId = Auth::guard('admin')->id();
      $admin = Admin::where('id', $adminId)->first();

      if(!$admin){
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'failureMsg', '');
      }
  
      $rules = AccountValidator::rules('profile', $adminId);
      $messages = AccountValidator::messages();
  
      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->fails()) {
        return ApiResponse::validateError($validator->errors());
      }

      try{
        $ipAddress = $request->header('X-Forwarded-For') ?? $request->ip();
        $validatedData = $validator->validated();

        $admin->name = $validatedData['name'];
        $admin->username = $validatedData['username'];
        $admin->email = $validatedData['email'];

        $admin->save();

        $encryptedData = Protection::encryptData($validatedData, $ipAddress);

        AdminLogs::logActivity(
          'PROFILE UPDATE SUCCESS', 
          'Http/Controllers/Backend/Api/Admin/AccountApiController@profileUpdate', 
          [
            'ip' => $ipAddress,
            'data' => $encryptedData
          ]
        );

        Auth::guard('admin')->setUser($admin);

        return ApiResponse::alert(201, 'alertSuccessReload', 'Success', 'success', 'recordUpdated', '');
      }
      catch(\Throwable $e){
        AdminLogs::logError(
          'PROFILE UPDATE FAILED', 
          'Http/Controllers/Backend/Api/Admin/AccountApiController@profileUpdate', 
          $e
        );

        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'failureMsg', '');
      }
    }else{
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'failureMsg', '');
    }
  }

  /**
   *  @api - Admin password update
   *  @url - /api/cms/password/update
   *  @author - Amit Kashte
   *  @function - function to update admin password details
   */
  public function passwordUpdate(Request $request){

    if (Auth::guard('admin')->check()) {

      $adminId = Auth::guard('admin')->id();
      $admin = Admin::where('id', $adminId)->first();

      if(!$admin){
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'failureMsg', '');
      }
  
      $rules = AccountValidator::rules('password', $adminId);
      $messages = AccountValidator::messages();
  
      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->fails()) {
        return ApiResponse::validateError($validator->errors());
      }

      try{
        $ipAddress = $request->header('X-Forwarded-For') ?? $request->ip();
        $validatedData = $validator->validated();

        $admin->password_enc = Hash::make($validatedData['newPassword']);
        $admin->save();

        AdminLogs::logActivity(
          'PASSWORD UPDATE SUCCESS', 
          'Http/Controllers/Backend/Api/Admin/AccountApiController@passwordUpdate', 
          [
            'ip' => $ipAddress,
            'data' => [
              'name' => $admin->name
            ]
          ]
        );

        return ApiResponse::alert(201, 'alertSuccessReload', 'Success', 'success', 'recordUpdated', '');
      }
      catch(\Throwable $e){
        AdminLogs::logError(
          'PASSWORD UPDATE FAILED', 
          'Http/Controllers/Backend/Api/Admin/AccountApiController@passwordUpdate', 
          $e
        );

        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'failureMsg', '');
      }
    }else{
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'failureMsg', '');
    }
  }
}