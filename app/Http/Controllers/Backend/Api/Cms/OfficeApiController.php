<?php

namespace App\Http\Controllers\Backend\Api\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Backend\Api\Validators\Cms\Office as OfficeValidator;
use App\Utility\ApiResponse;

use App\Models\Office;

class OfficeApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';

    $rules = OfficeValidator::rules($language, 'new', null);
    $messages = OfficeValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new Office();
        $newRecord->admin_id = $adminId;
        $newRecord->name = $this->getNameObject($validatedData);
        $newRecord->address = $this->getAddressObject($validatedData);
        $newRecord->map = $validatedData['map'];
        $newRecord->phone = $validatedData['phone'];
        $newRecord->fax = $validatedData['fax'];
        $newRecord->email = $validatedData['email'];
        $newRecord->language = $validatedData['language'];
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'officeList');
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

    $officeId = $request->id ?? '';
    $language = $request->language ?? '';

    $officeRecord = Office::where('id', $officeId)->first();

    if(!$officeRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = OfficeValidator::rules($language, 'existing', null);
    $messages = OfficeValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $officeRecord->name = $this->getNameObject($validatedData);
        $officeRecord->address = $this->getAddressObject($validatedData);
        $officeRecord->map = $validatedData['map'];
        $officeRecord->phone = $validatedData['phone'];
        $officeRecord->fax = $validatedData['fax'];
        $officeRecord->email = $validatedData['email'];
        $officeRecord->language = $validatedData['language'];
        $officeRecord->status = $validatedData['status'];
        $officeRecord->admin_id = $adminId;
        
        $officeRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'officeList');
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

    $officeId = $request->recordId ?? '';
    $officeRecord = Office::where('id', $officeId)->first();

    if(!$officeRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $officeRecord->delete();
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

  protected function getAddressObject($data){
    return [
      'en' => $data['addressEn'] ?? '',
      'kr' => $data['addressKr'] ?? ''
    ];
  }
}