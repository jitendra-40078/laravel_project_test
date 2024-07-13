<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Backend\Api\Pages\Content;
use App\Http\Controllers\Backend\Api\Pages\Seo;
use App\Http\Controllers\Backend\Api\Validators\Page as PageValidator;
use App\Utility\ApiResponse;

use App\Http\Controllers\Controller;
use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

  // public function store(){
  //   try{
  //     if (Auth::guard('admin')->check()) {
  //       $adminId = Auth::guard('admin')->id();
    
  //       $newPage = new Page();
  //       $newPage->admin_id = $adminId;
  //       $newPage->template = 'blog';
  //       $newPage->name = "Blog";
  //       $newPage->slug = 'blog';
  //       $newPage->path = '/blog';
  //       $newPage->seo = [];
  //       $newPage->content = [];
  //       $newPage->lang = 'kr'; // en kr

  //       $newPage->save();
  //       return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordUpdated', '');
  //     }else{
  //       return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
  //     }
  //   }
  //   catch(\Exception $e){
  //     dd($e);
  //     return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
  //   }
  // }

  public function update(Request $request){
    
    $pageCode = $request->code ?? '';
    $pageRecord = Page::where('code', $pageCode)->first();

    if(!$pageRecord && !$pageRecord->template){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = PageValidator::rules($pageRecord->template, $pageRecord->lang, $request);
    $messages = PageValidator::messages($pageRecord->template, $request);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $seo = Seo::get($validatedData);
        $content = Content::get($pageRecord->template, $validatedData);
  
        $pageRecord->seo = $seo;
        $pageRecord->content = $content;
        $pageRecord->admin_id = $adminId;

        $pageRecord->save();
  
        return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordUpdated', '');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }
}