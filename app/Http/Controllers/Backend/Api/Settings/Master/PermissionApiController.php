<?php

namespace App\Http\Controllers\Backend\Api\Settings\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Http\Controllers\Backend\Api\Validators\Settings\Master\Permission as PermissionValidator;

use App\Utility\ApiResponse;

use App\Models\Permission;

class PermissionApiController extends Controller
{
  public function store(Request $request){

    $rules = PermissionValidator::rules('new', null);
    $messages = PermissionValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $newRecord = new Permission();
        $newRecord->name = $validatedData['name'];
        $newRecord->guard_name = 'admin';
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessReload', 'Success', 'success', 'recordAdded', '');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Throwable $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function update(Request $request){

    $permissionId = $request->id ?? '';
    $permissionRecord = Permission::where('id', $permissionId)->first();

    if(!$permissionRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = PermissionValidator::rules('existing', $permissionId);
    $messages = PermissionValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
    
        $permissionRecord->name = $validatedData['name'];
        $permissionRecord->status = $validatedData['status'];
        $permissionRecord->guard_name = 'admin';

        $permissionRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'rolePermissionList');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Throwable $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function delete(Request $request){

    $permissionId = $request->recordId ?? '';
    $permissionRecord = Permission::where('id', $permissionId)->first();

    if(!$permissionRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $permissionRecord->delete();
      return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordDeleted', '');
    }
    catch(\Throwable $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }
}