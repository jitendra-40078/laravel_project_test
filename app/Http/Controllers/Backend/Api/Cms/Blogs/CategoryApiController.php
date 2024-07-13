<?php

namespace App\Http\Controllers\Backend\Api\Cms\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Http\Controllers\Backend\Api\Validators\Cms\Blogs\Category as CategoryValidator;

use App\Utility\ApiResponse;

use App\Models\BlogCategory;

class CategoryApiController extends Controller
{
  public function store(Request $request){

    $rules = CategoryValidator::rules('new', null);
    $messages = CategoryValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new BlogCategory();
        $newRecord->admin_id = $adminId;
        $newRecord->nameEn = $validatedData['nameEn'];
        $newRecord->nameKr = $validatedData['nameKr'];
        // $newRecord->slug = Str::slug($validatedData['name']);
        $newRecord->slug = '';
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

    $categoryId = $request->id ?? '';
    $categoryRecord = BlogCategory::where('id', $categoryId)->first();

    if(!$categoryRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = CategoryValidator::rules('existing', $categoryId);
    $messages = CategoryValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $categoryRecord->nameEn = $validatedData['nameEn'];
        $categoryRecord->nameKr = $validatedData['nameKr'];
        $categoryRecord->status = $validatedData['status'];
        $categoryRecord->admin_id = $adminId;
        
        $categoryRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'blogCategoryList');
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

    $categoryId = $request->recordId ?? '';
    $categoryRecord = BlogCategory::where('id', $categoryId)->first();

    if(!$categoryRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $categoryRecord->delete();
      return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordDeleted', '');
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }
}