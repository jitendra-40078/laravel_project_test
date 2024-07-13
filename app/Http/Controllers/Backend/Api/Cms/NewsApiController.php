<?php

namespace App\Http\Controllers\Backend\Api\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Http\Controllers\Backend\Api\Validators\Cms\News as NewsValidator;
use App\Utility\ApiResponse;

use App\Models\News;

class NewsApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';

    $rules = NewsValidator::rules($request, $language, 'new', null);
    $messages = NewsValidator::messages($request);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new News();
        $newRecord->admin_id = $adminId;

        $newRecord->name = $validatedData['name'];
        $newRecord->slug = Str::slug($validatedData['name']);

        $newRecord->title = $this->getTitleObject($validatedData);
        $newRecord->short_description = $this->getDescriptionObject($validatedData);
        $newRecord->content = $this->getContentObject($validatedData);
        $newRecord->image = $this->getImageObject($validatedData);

        $newRecord->type = $validatedData['type'];
        $newRecord->language = $validatedData['language'];
        $newRecord->is_featured = $validatedData['is_featured'] ?? 'N';
        $newRecord->publish_date = date('Y-m-d', strtotime($validatedData['publish_date']));
        $newRecord->status = 'A';

        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'newsList');
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

    $newsId = $request->id ?? '';
    $language = $request->language ?? '';

    $newsRecord = News::where('id', $newsId)->first();

    if(!$newsRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = NewsValidator::rules($request, $language, 'existing', $newsId);
    $messages = NewsValidator::messages($request);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newsRecord->admin_id = $adminId;

        $newsRecord->name = $validatedData['name'];
        $newsRecord->slug = Str::slug($validatedData['name']);

        $newsRecord->title = $this->getTitleObject($validatedData);
        $newsRecord->short_description = $this->getDescriptionObject($validatedData);
        $newsRecord->content = $this->getContentObject($validatedData);
        $newsRecord->image = $this->getImageObject($validatedData);

        $newsRecord->type = $validatedData['type'];
        $newsRecord->language = $validatedData['language'];
        $newsRecord->is_featured = $validatedData['is_featured'] ?? 'N';
        $newsRecord->publish_date = date('Y-m-d', strtotime($validatedData['publish_date']));
        $newsRecord->status = $validatedData['status'];
        
        $newsRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'newsList');
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

    $newsId = $request->recordId ?? '';
    $newsRecord = News::where('id', $newsId)->first();

    if(!$newsRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $newsRecord->delete();
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