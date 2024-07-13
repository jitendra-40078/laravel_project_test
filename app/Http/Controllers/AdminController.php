<?php

namespace App\Http\Controllers;

use App\Utility\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  protected $activeUserInfo = null;
  protected $ipAddress = null;
  protected $apiFilePath = 'Http/Controllers/Backend/Api';
  protected $viewFilePath = 'Http/Controllers/Backend/View';

  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->activeUserInfo = Auth::guard('admin')->user();
      $this->ipAddress = $request->header('X-Forwarded-For') ?? $request->ip();

      return $next($request);
    });
  }

  /**
  * Validate admin session and respond accordingly.
  * @author Amit Kashte
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\JsonResponse for api route or \Illuminate\Http\RedirectResponse
  */
  protected function validateAdmin(Request $request){
    if( !Auth::guard('admin')->check() ){
      if(str_contains($request->path(), 'api/')){
        return ApiResponse::send(
          401,
          false,
          1000,
          'Access denied',
          []
        );   
      }
  
      return redirect()->guest(route('admin.login'));
    }

    return null;
  }

  /**
  * Validate admin session and permissions.
  * @author Amit Kashte
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\JsonResponse for api route or \Illuminate\Http\RedirectResponse
  */
  protected function authorizeAdmin(Request $request, $permissions){
    if( Auth::guard('admin')->check() ){

      if( $this->activeUserInfo && $this->activeUserInfo->type === "SA" ){
        return null;
      }

      // if( 
      //   $this->activeUserInfo && 
      //   $this->activeUserInfo->type === "A" && 
      //   in_array('metrics', $permissions)
      // ){
      //   return null;
      // }

      if( 
        $this->activeUserInfo && 
        $this->activeUserInfo->type === "A" && 
        $this->activeUserInfo->hasAnyPermission($permissions) 
      ){
        return null;
      }else{

        if(str_contains($request->path(), 'api/')){
          return ApiResponse::send(
            401,
            false,
            1000,
            'Unauthorized access',
            [
              'type' => 'alert',
              'icon' => 'error',
              'title' => 'Access Denied',
              'text' => 'Sorry, you currently do not have the necessary permissions to perform this action',
              'action' => '',
              'webUrl' => ''
            ]
          );
        }

        return redirect()->guest(route('admin.dashboard'));
      }
    }

    if(str_contains($request->path(), 'api/')){
      return ApiResponse::send(
        401,
        false,
        1000,
        'Access denied',
        []
      );   
    }

    return redirect()->guest(route('admin.login'));
  }

  protected function validateKey($array, $key){
    return isset($array[$key]) && $array[$key] ? $array[$key] : '';
  }
}