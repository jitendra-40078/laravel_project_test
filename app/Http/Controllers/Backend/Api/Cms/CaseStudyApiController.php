<?php

namespace App\Http\Controllers\Backend\Api\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Backend\Api\Validators\Cms\CaseStudy as CaseStudyValidator;
use App\Utility\ApiResponse;

use App\Models\CaseStudy;

class CaseStudyApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';

    $rules = CaseStudyValidator::rules($language, 'new', null);
    $messages = CaseStudyValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new CaseStudy();
        $newRecord->admin_id = $adminId;
        $newRecord->title = $this->getTitleObject($validatedData);
        $newRecord->content = $this->getContentObject($validatedData);
        $newRecord->image = $this->getImageObject($validatedData);
        $newRecord->logo = $this->getLogoObject($validatedData);
        $newRecord->report = $this->getReportObject($validatedData);
        $newRecord->duration = $validatedData['duration'];
        $newRecord->language = $validatedData['language'];
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'casestudyList');
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

    $casestudyId = $request->id ?? '';
    $language = $request->language ?? '';

    $casestudyRecord = CaseStudy::where('id', $casestudyId)->first();

    if(!$casestudyRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = CaseStudyValidator::rules($language, 'existing', null);
    $messages = CaseStudyValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $casestudyRecord->title = $this->getTitleObject($validatedData);
        $casestudyRecord->content = $this->getContentObject($validatedData);
        $casestudyRecord->image = $this->getImageObject($validatedData);
        $casestudyRecord->logo = $this->getLogoObject($validatedData);
        $casestudyRecord->report = $this->getReportObject($validatedData);
        $casestudyRecord->duration = $validatedData['duration'];
        $casestudyRecord->language = $validatedData['language'];
        $casestudyRecord->status = $validatedData['status'];
        $casestudyRecord->admin_id = $adminId;
        
        $casestudyRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'casestudyList');
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

    $casestudyId = $request->recordId ?? '';
    $casestudyRecord = CaseStudy::where('id', $casestudyId)->first();

    if(!$casestudyRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $casestudyRecord->delete();
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

  protected function getLogoObject($data){
    return [
      'en' => $data['logoEn'] ?? '',
      'kr' => $data['logoKr'] ?? ''
    ];
  }

  protected function getReportObject($data){
    return [
      'en' => $data['reportEn'] ?? '',
      'kr' => $data['reportKr'] ?? ''
    ];
  }
}