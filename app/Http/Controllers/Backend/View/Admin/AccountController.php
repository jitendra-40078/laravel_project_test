<?php

namespace App\Http\Controllers\Backend\View\Admin;

use App\Http\Controllers\Controller;
use App\Utility\Protection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
  public function dashboardPage(){
    return view('backend.account.dashboard');
  }

  public function profilePage(){
    
    $userInfo = Auth::guard('admin')->user();
    
    if( !$userInfo ){
      return redirect()->route('cms.account.dashboard');
    }

    $responseObject = [
      'pageTitle' => 'CMS - My Profile',
      'activeMenu' => 'profile-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'admin/account',
      'userInfo' => $userInfo
    ];

    return view('backend.account.profile', $responseObject);
  }
}
