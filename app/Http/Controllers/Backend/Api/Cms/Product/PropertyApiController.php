<?php

namespace App\Http\Controllers\Backend\Api\Cms\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Http\Controllers\Backend\Api\Validators\Cms\Product\Property as PropertyValidator;

use App\Utility\ApiResponse;

use App\Models\ProductProperty;

class PropertyApiController extends Controller
{
  public function store(Request $request){

    $rules = PropertyValidator::rules('new', null);
    $messages = PropertyValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new ProductProperty();
        $newRecord->admin_id = $adminId;
        $newRecord->nameEn = $validatedData['nameEn'];
        $newRecord->nameKr = $validatedData['nameKr'];
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessReload', 'Success', 'success', 'recordAdded', '');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function update(Request $request){

    $propertyId = $request->id ?? '';
    $propertyRecord = ProductProperty::where('id', $propertyId)->first();

    if(!$propertyRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = PropertyValidator::rules('existing', $propertyId);
    $messages = PropertyValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $propertyRecord->nameEn = $validatedData['nameEn'];
        $propertyRecord->nameKr = $validatedData['nameKr'];
        $propertyRecord->status = $validatedData['status'];
        $propertyRecord->admin_id = $adminId;
        
        $propertyRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'productPropertyList');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function delete(Request $request){

    $propertyId = $request->recordId ?? '';
    $propertyRecord = ProductProperty::where('id', $propertyId)->first();

    if(!$propertyRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $propertyRecord->delete();
      return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordDeleted', '');
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }
}