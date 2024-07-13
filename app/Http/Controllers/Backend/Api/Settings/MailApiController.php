<?php

namespace App\Http\Controllers\Backend\Api\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Backend\Api\Validators\Settings\Email as EmailValidator;
use App\Utility\ApiResponse;

use App\Models\Setting;

class MailApiController extends Controller
{
  public function updateSmtp(Request $request){

    $smtpId = $request->smtpId ?? '';
    $setting = Setting::where('id', $smtpId)->first();

    if(!$setting){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = EmailValidator::rules('mail-smtp');
    $messages = EmailValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $setting->options = $this->getSmtpOptions($validatedData);
        $setting->admin_id = $adminId;
        
        $setting->save();
    
        return ApiResponse::alert(200, 'alert', 'Success', 'success', 'recordUpdated', '');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function updateCareerEmails(Request $request){

    $careerId = $request->careerId ?? '';
    $setting = Setting::where('id', $careerId)->first();

    if(!$setting){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = EmailValidator::rules('mail-career-enquiry');
    $messages = EmailValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $setting->options = $this->getCareerEmailOptions($validatedData);
        $setting->admin_id = $adminId;
        
        $setting->save();
    
        return ApiResponse::alert(200, 'alert', 'Success', 'success', 'recordUpdated', '');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function updateContactEmails(Request $request){

    $contactId = $request->contactId ?? '';
    $setting = Setting::where('id', $contactId)->first();

    if(!$setting){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = EmailValidator::rules('mail-contact-enquiry');
    $messages = EmailValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $setting->options = $this->getContactEmailOptions($validatedData);
        $setting->admin_id = $adminId;
        
        $setting->save();
    
        return ApiResponse::alert(200, 'alert', 'Success', 'success', 'recordUpdated', '');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  protected function getSmtpOptions($data){
    return [
      'host' => $data['smtpHost'] ?? '',
      'port' => $data['smtpPort'] ?? '',
      'username' => $data['smtpUsername'] ?? '',
      'password' => $data['smtpPassword'] ?? ''
    ];
  }

  protected function getCareerEmailOptions($data){
    return [
      'subject' => $data['careerSubject'] ?? '',
      'toEmails' => $data['careerToEmail'] ?? '',
      'ccEmails' => $data['careerCcEmail'] ?? ''
    ];
  }

  protected function getContactEmailOptions($data){
    return [
      'subject' => $data['contactSubject'] ?? '',
      'toEmails' => $data['contactToEmail'] ?? '',
      'ccEmails' => $data['contactCcEmail'] ?? ''
    ];
  }
}