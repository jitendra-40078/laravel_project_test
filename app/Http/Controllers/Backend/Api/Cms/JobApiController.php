<?php

namespace App\Http\Controllers\Backend\Api\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Backend\Api\Validators\Cms\Job as JobValidator;
use App\Utility\ApiResponse;

use App\Models\Job;

class JobApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';

    $rules = JobValidator::rules($language, 'new', null);
    $messages = JobValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new Job();
        $newRecord->admin_id = $adminId;
        $newRecord->title = $this->getTitleObject($validatedData);
        $newRecord->location = $this->getLocationObject($validatedData);
        $newRecord->description = $this->getDescriptionObject($validatedData);
        $newRecord->responsibility = $this->getResponsibilityObject($validatedData);
        $newRecord->language = $validatedData['language'];
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'jobList');
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

    $jobId = $request->id ?? '';
    $language = $request->language ?? '';

    $jobRecord = Job::where('id', $jobId)->first();

    if(!$jobRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = JobValidator::rules($language, 'existing', null);
    $messages = JobValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
        
        $jobRecord->title = $this->getTitleObject($validatedData);
        $jobRecord->location = $this->getLocationObject($validatedData);
        $jobRecord->description = $this->getDescriptionObject($validatedData);
        $jobRecord->responsibility = $this->getResponsibilityObject($validatedData);
        $jobRecord->language = $validatedData['language'];
        $jobRecord->status = $validatedData['status'];
        $jobRecord->admin_id = $adminId;
        
        $jobRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'jobList');
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

    $jobId = $request->recordId ?? '';
    $jobRecord = Job::where('id', $jobId)->first();

    if(!$jobRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $jobRecord->delete();
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

  protected function getLocationObject($data){
    return [
      'en' => $data['locationEn'] ?? '',
      'kr' => $data['locationKr'] ?? ''
    ];
  }

  protected function getDescriptionObject($data){
    return [
      'en' => $data['descriptionEn'] ?? '',
      'kr' => $data['descriptionKr'] ?? ''
    ];
  }

  protected function getResponsibilityObject($data){
    return [
      'en' => $data['responsibilityEn'] ?? '',
      'kr' => $data['responsibilityKr'] ?? ''
    ];
  }
}