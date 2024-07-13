<?php

namespace App\Http\Controllers\Backend\View\Settings;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use Illuminate\Http\Request;

use App\Models\Setting;

class EmailController extends Controller
{

  public function formPage(){

    $smtp = Setting::with('admin:id,name')
                ->select('id', 'key', 'options', 'admin_id', 'updated_at')
                ->where('key', 'mail-smtp')
                ->first();

    $careerMailSetting = Setting::with('admin:id,name')
                            ->select('id', 'key', 'options', 'admin_id', 'updated_at')
                            ->where('key', 'mail-career-enquiry')
                            ->first();

    $contactMailSetting = Setting::with('admin:id,name')
                            ->select('id', 'key', 'options', 'admin_id', 'updated_at')
                            ->where('key', 'mail-contact-enquiry')
                            ->first();

    $responseObject = [
      'pageTitle' => 'DareeSoft - Settings',
      'activeMenu' => 'settings-mail-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'settings/email',
      'smtp' => $smtp,
      'careerMailSetting' => $careerMailSetting,
      'contactMailSetting' => $contactMailSetting
    ];

    return view('backend.settings.email.form', $responseObject);
  }
}
