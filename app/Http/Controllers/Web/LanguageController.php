<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
  public function switchLang($lang)
  {
    if (array_key_exists($lang, config('app.locales'))) {
      session()->put('locale', $lang);
    }

    return back();
  }
}
