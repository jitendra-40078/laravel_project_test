<?php

namespace App\Http\Controllers\Backend\Api\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Backend\Api\Validators\Cms\Milestone as MilestoneValidator;
use App\Utility\ApiResponse;

use App\Models\Milestone;

class MilestoneApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';

    $rules = MilestoneValidator::rules($language, 'new', null);
    $messages = MilestoneValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $monthYearInput = $validatedData['monthYearPicker'];

        // Parse the input
        list($monthName, $year) = explode(' ', $monthYearInput);
        $month = date('m', strtotime($monthName . " 1"));

        $newRecord = new Milestone();
        $newRecord->admin_id = $adminId;
        $newRecord->content = $this->getContentObject($validatedData);
        $newRecord->year = $year;
        $newRecord->month = $month;
        $newRecord->language = $validatedData['language'];
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'milestoneList');
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

    $milestoneId = $request->id ?? '';
    $language = $request->language ?? '';

    $milestoneRecord = Milestone::where('id', $milestoneId)->first();

    if(!$milestoneRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = MilestoneValidator::rules($language, 'existing', null);
    $messages = MilestoneValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $monthYearInput = $validatedData['monthYearPicker'];

        // Parse the input
        list($monthName, $year) = explode(' ', $monthYearInput);
        $month = date('m', strtotime($monthName . " 1"));
        
        $milestoneRecord->content = $this->getContentObject($validatedData);
        $milestoneRecord->year = $year;
        $milestoneRecord->month = $month;
        $milestoneRecord->language = $validatedData['language'];
        $milestoneRecord->status = $validatedData['status'];
        $milestoneRecord->admin_id = $adminId;
        
        $milestoneRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'milestoneList');
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

    $milestoneId = $request->recordId ?? '';
    $milestoneRecord = Milestone::where('id', $milestoneId)->first();

    if(!$milestoneRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $milestoneRecord->delete();
      return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordDeleted', '');
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  protected function getContentObject($data){
    return [
      'en' => $data['contentEn'] ?? '',
      'kr' => $data['contentKr'] ?? ''
    ];
  }
}