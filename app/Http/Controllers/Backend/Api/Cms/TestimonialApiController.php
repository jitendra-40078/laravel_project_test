<?php

namespace App\Http\Controllers\Backend\Api\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Backend\Api\Validators\Cms\Testimonial as TestimonialValidator;
use App\Utility\ApiResponse;

use App\Models\Testimonial;

class TestimonialApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';

    $rules = TestimonialValidator::rules($language, 'new', null);
    $messages = TestimonialValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new Testimonial();
        $newRecord->admin_id = $adminId;
        $newRecord->title = $this->getTitleObject($validatedData);
        $newRecord->content = $this->getContentObject($validatedData);
        $newRecord->image = $this->getImageObject($validatedData);
        $newRecord->year = $validatedData['year'];
        $newRecord->language = $validatedData['language'];
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'testimonialList');
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

    $testimonialId = $request->id ?? '';
    $language = $request->language ?? '';

    $testimonialRecord = Testimonial::where('id', $testimonialId)->first();

    if(!$testimonialRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = TestimonialValidator::rules($language, 'existing', null);
    $messages = TestimonialValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $testimonialRecord->title = $this->getTitleObject($validatedData);
        $testimonialRecord->content = $this->getContentObject($validatedData);
        $testimonialRecord->image = $this->getImageObject($validatedData);
        $testimonialRecord->year = $validatedData['year'];
        $testimonialRecord->language = $validatedData['language'];
        $testimonialRecord->status = $validatedData['status'];
        $testimonialRecord->admin_id = $adminId;
        
        $testimonialRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'testimonialList');
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

    $testimonialId = $request->recordId ?? '';
    $testimonialRecord = Testimonial::where('id', $testimonialId)->first();

    if(!$testimonialRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $testimonialRecord->delete();
      return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordDeleted', '');
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  protected function getTitleObject($data){
    return [
      'en' => $data['titleEn'] ?? '',
      'kr' => $data['titleKr'] ?? ''
    ];
  }

  protected function getContentObject($data){
    return [
      'en' => $data['contentEn'] ?? '',
      'kr' => $data['contentKr'] ?? ''
    ];
  }

  protected function getImageObject($data){
    return [
      'en' => $data['imageEn'] ?? '',
      'kr' => $data['imageKr'] ?? ''
    ];
  }
}