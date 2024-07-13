<?php

namespace App\Http\Controllers\Backend\Api\Cms\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Http\Controllers\Backend\Api\Validators\Cms\Blogs\Blog as BlogValidator;
use App\Utility\ApiResponse;

use App\Models\Blog;

class BlogApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';

    $rules = BlogValidator::rules($request, $language, 'new', null);
    $messages = BlogValidator::messages($request);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new Blog();
        $newRecord->admin_id = $adminId;
        $newRecord->blog_category_id = $validatedData['category'];

        $newRecord->name = $validatedData['name'];
        $newRecord->slug = Str::slug($validatedData['name']);

        $newRecord->seo = [];
        $newRecord->title = $this->getTitleObject($validatedData);
        $newRecord->short_description = $this->getDescriptionObject($validatedData);
        $newRecord->content = $this->getContentObject($validatedData);
        $newRecord->image = $this->getImageObject($validatedData);

        $newRecord->views = 0;
        $newRecord->language = $validatedData['language'];
        $newRecord->is_trending = $validatedData['is_trending'] ?? 'N';
        $newRecord->is_popular = $validatedData['is_popular'] ?? 'N';
        $newRecord->publish_date = date('Y-m-d', strtotime($validatedData['publish_date']));
        $newRecord->status = 'A';

        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'blogList');
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

    $blogId = $request->id ?? '';
    $language = $request->language ?? '';

    $blogRecord = Blog::where('id', $blogId)->first();

    if(!$blogRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = BlogValidator::rules($request, $language, 'existing', $blogId);
    $messages = BlogValidator::messages($request);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $blogRecord->admin_id = $adminId;
        $blogRecord->blog_category_id = $validatedData['category'];

        $blogRecord->name = $validatedData['name'];
        $blogRecord->slug = Str::slug($validatedData['name']);

        $blogRecord->title = $this->getTitleObject($validatedData);
        $blogRecord->short_description = $this->getDescriptionObject($validatedData);
        $blogRecord->content = $this->getContentObject($validatedData);
        $blogRecord->image = $this->getImageObject($validatedData);

        $blogRecord->language = $validatedData['language'];
        $blogRecord->is_trending = $validatedData['is_trending'] ?? 'N';
        $blogRecord->is_popular = $validatedData['is_popular'] ?? 'N';
        $blogRecord->publish_date = date('Y-m-d', strtotime($validatedData['publish_date']));
        $blogRecord->status = $validatedData['status'];
        
        $blogRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'blogList');
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

    $blogId = $request->recordId ?? '';
    $blogRecord = Blog::where('id', $blogId)->first();

    if(!$blogRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $blogRecord->delete();
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
    $contentEnSet = $data['contentEnSet'] ?? '';
    $contentEnCards = [];

    if( $contentEnSet ){
      $sectionIndexes = explode(",", $contentEnSet);

      foreach ($sectionIndexes as $index) {
        switch($data["contentEnLayoutR$index"] ?? ''){
          case 'layout_1': {
            $head = $data["contentEnHeadR$index"] ?? '';
            $text = $data["contentEnTextR$index"] ?? '';
            
            if( $head || $text ){
              $record = [
                "layout" => 'layout_1',
                "head" => $head,
                "text" => $text
              ];
    
              array_push($contentEnCards, $record);
            }
          }
          break;
          case 'layout_2': {
            $text = $data["contentEnTextR$index"] ?? '';
            
            if( $text ){
              $record = [
                "layout" => 'layout_2',
                "text" => $text
              ];
    
              array_push($contentEnCards, $record);
            }
          }
          break;
          case 'layout_3': {
            $image = $data["contentEnImageR$index"] ?? '';
            $caption = $data["contentEnCaptionR$index"] ?? '';

            if( $image || $caption ){
              $record = [
                "layout" => 'layout_3',
                "image" => $image,
                "caption" => $caption
              ];
    
              array_push($contentEnCards, $record);
            }
          }
          break;
        }
      }
    }

    $contentKrSet = $data['contentKrSet'] ?? '';
    $contentKrCards = [];

    if( $contentKrSet ){
      $sectionIndexes = explode(",", $contentKrSet);

      foreach ($sectionIndexes as $index) {
        switch($data["contentKrLayoutR$index"] ?? ''){
          case 'layout_1': {
            $head = $data["contentKrHeadR$index"] ?? '';
            $text = $data["contentKrTextR$index"] ?? '';
            
            if( $head || $text ){
              $record = [
                "layout" => 'layout_1',
                "head" => $head,
                "text" => $text
              ];
    
              array_push($contentKrCards, $record);
            }
          }
          break;
          case 'layout_2': {
            $text = $data["contentKrTextR$index"] ?? '';
            
            if( $text ){
              $record = [
                "layout" => 'layout_2',
                "text" => $text
              ];
    
              array_push($contentKrCards, $record);
            }
          }
          break;
          case 'layout_3': {
            $image = $data["contentKrImageR$index"] ?? '';
            $caption = $data["contentKrCaptionR$index"] ?? '';
            
            if( $image || $caption ){
              $record = [
                "layout" => 'layout_3',
                "image" => $image,
                "caption" => $caption
              ];
    
              array_push($contentKrCards, $record);
            }
          }
          break;

        }
      }
    }

    return [
      'en' => $contentEnCards,
      'kr' => $contentKrCards
    ];
  }

  protected function getImageObject($data){
    return [
      'en' => $data['imageEn'] ?? '',
      'kr' => $data['imageKr'] ?? ''
    ];
  }

  protected function getDescriptionObject($data){
    return [
      'en' => $data['shortDescEn'] ?? '',
      'kr' => $data['shortDescKr'] ?? ''
    ];
  }
}