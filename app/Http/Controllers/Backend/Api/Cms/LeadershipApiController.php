<?php

namespace App\Http\Controllers\Backend\Api\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Backend\Api\Validators\Cms\Leadership as LeadershipValidator;
use App\Utility\ApiResponse;

use App\Models\Leadership;

class LeadershipApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';

    $rules = LeadershipValidator::rules($language, 'new', null);
    $messages = LeadershipValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new Leadership();
        $newRecord->admin_id = $adminId;
        $newRecord->name = $this->getNameObject($validatedData);
        $newRecord->designation = $this->getDesignationObject($validatedData);
        $newRecord->description = $this->getDescriptionObject($validatedData);
        $newRecord->image = $this->getImageObject($validatedData);
        $newRecord->language = $validatedData['language'];
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'leadershipList');
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

    $leadershipId = $request->id ?? '';
    $language = $request->language ?? '';

    $leadershipRecord = Leadership::where('id', $leadershipId)->first();

    if(!$leadershipRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = LeadershipValidator::rules($language, 'existing', null);
    $messages = LeadershipValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $leadershipRecord->name = $this->getNameObject($validatedData);
        $leadershipRecord->designation = $this->getDesignationObject($validatedData);
        $leadershipRecord->description = $this->getDescriptionObject($validatedData);
        $leadershipRecord->image = $this->getImageObject($validatedData);
        $leadershipRecord->language = $validatedData['language'];
        $leadershipRecord->status = $validatedData['status'];
        $leadershipRecord->admin_id = $adminId;
        
        $leadershipRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'leadershipList');
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

    $leadershipId = $request->recordId ?? '';
    $leadershipRecord = Leadership::where('id', $leadershipId)->first();

    if(!$leadershipRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $leadershipRecord->delete();
      return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordDeleted', '');
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  protected function getNameObject($data){
    return [
      'en' => $data['nameEn'] ?? '',
      'kr' => $data['nameKr'] ?? ''
    ];
  }

  protected function getDesignationObject($data){
    return [
      'en' => $data['designationEn'] ?? '',
      'kr' => $data['designationKr'] ?? ''
    ];
  }

  protected function getDescriptionObject($data){
    return [
      'en' => $data['descriptionEn'] ?? '',
      'kr' => $data['descriptionKr'] ?? ''
    ];
  }

  protected function getImageObject($data){
    return [
      'en' => $data['imageEn'] ?? '',
      'kr' => $data['imageKr'] ?? ''
    ];
  }
}