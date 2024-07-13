<?php

namespace App\Http\Controllers\Backend\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function loginPage(){
    return view('backend.auth.login');
  }
}
