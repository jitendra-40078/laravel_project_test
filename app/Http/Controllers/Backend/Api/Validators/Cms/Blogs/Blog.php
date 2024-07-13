<?php

namespace App\Http\Controllers\Backend\Api\Validators\Cms\Blogs;

class Blog
{
  public static function rules($request, $language, $type, $recordId)
  {
    $rules = [
      'language' => 'bail|required|in:en,kr,both',
      'category' => 'bail|required|integer',
      'is_trending' => 'bail|nullable|in:Y,N',
      'is_popular' => 'bail|nullable|in:Y,N',
      'publish_date' => 'bail|required|date'
    ];

    if( in_array($language, ['en', 'both'])){
      $rules['imageEn'] = 'bail|required';
      $rules['titleEn'] = 'bail|required|alpha_string|max:500';
      $rules['shortDescEn'] = 'bail|required|alpha_string|max:1000';
      $rules['contentEnSet'] = 'nullable|bail|regex:/^[0-9,]+$/';
    
      $contentEnSet = $request->contentEnSet ?? '';
      if( $contentEnSet ){
        $sectionIndexes = explode(",", $contentEnSet);
  
        foreach ($sectionIndexes as $index) {
          $rules["contentEnLayoutR$index"] = 'nullable';

          switch($request["contentEnLayoutR$index"]){
            case 'layout_1': {
              $rules["contentEnHeadR$index"] = 'bail|required|alpha_string|max:500';
              // $rules["contentEnTextR$index"] = 'bail|required|alpha_string_en|htmlpurify|max:10000';
              $rules["contentEnTextR$index"] = 'bail|required|alpha_string|max:10000';
            }
            break;
            case 'layout_2': {
              // $rules["contentEnTextR$index"] = 'bail|required|alpha_string_en|htmlpurify|max:10000';
              $rules["contentEnTextR$index"] = 'bail|required|alpha_string|max:10000';
            }
            break;
            case 'layout_3': {
              $rules["contentEnImageR$index"] = 'bail|required';
              $rules["contentEnCaptionR$index"] = 'bail|required|alpha_string|max:500';
            }
            break;
          }
        }
      }
    }

    if( in_array($language, ['kr', 'both'])){
      $rules['imageKr'] = 'bail|required';
      $rules['titleKr'] = 'bail|required|alpha_string|max:500';
      $rules['shortDescKr'] = 'bail|required|alpha_string|max:1000';
      $rules['contentKrSet'] = 'nullable|bail|regex:/^[0-9,]+$/';

      $contentKrSet = $request->contentKrSet ?? '';
      if( $contentKrSet ){
        $sectionIndexes = explode(",", $contentKrSet);
  
        foreach ($sectionIndexes as $index) {
          $rules["contentKrLayoutR$index"] = 'nullable';

          switch($request["contentKrLayoutR$index"]){
            case 'layout_1': {
              $rules["contentKrHeadR$index"] = 'bail|required|alpha_string|max:500';
              // $rules["contentKrTextR$index"] = 'bail|required|alpha_string_kr|htmlpurify|max:10000';
              $rules["contentKrTextR$index"] = 'bail|required|alpha_string|max:10000';
            }
            break;
            case 'layout_2': {
              // $rules["contentKrTextR$index"] = 'bail|required|alpha_string_kr|htmlpurify|max:10000';
              $rules["contentKrTextR$index"] = 'bail|required|alpha_string|max:10000';
            }
            break;
            case 'layout_3': {
              $rules["contentKrImageR$index"] = 'bail|required';
              $rules["contentKrCaptionR$index"] = 'bail|required|alpha_string|max:500';
            }
            break;
          }
        }
      }
    }

    if( $type === 'existing' ){
      $rules['status'] = 'bail|required|in:A,D';
      $rules['name'] = 'bail|required|unique:blogs,name,'.$recordId.'|alpha_string|max:500';
    }else{
      $rules['name'] = 'bail|required|unique:blogs,name|alpha_string|max:500';
    }

    return $rules;
  }

  public static function messages($request)
  {
    $messages = [
      'language.required' => 'The language is required.',
      'language.in' => 'The option is incorrect.',

      'type.required' => 'The type is required.',
      'type.in' => 'The option is incorrect.',

      'is_featured.in' => 'The option is incorrect.',

      'publish_date.required' => 'The publish date is required.',
      'publish_date.date' => 'The publish date must be a valid date.',

      'name.required' => 'The title is required.',
      'name.unique' => 'The title is already in use.',
      'name.alpha_string' => 'The title must be string.',
      'name.max' => 'The title must not be greater than 500 characters.',

      'imageEn.required' => 'The image is required.',

      'titleEn.required' => 'The title is required.',
      'titleEn.alpha_string' => 'The title must be string.',
      'titleEn.max' => 'The title must not be greater than 500 characters.',

      'shortDescEn.required' => 'The description is required.',
      'shortDescEn.alpha_string' => 'The description must be a string.',
      'shortDescEn.max' => 'The description must not be greater than 1000 characters.',

      'contentEnSet.regex' => 'The format is invalid.',

      'imageKr.required' => 'The image is required.',

      'titleKr.required' => 'The title is required.',
      'titleKr.alpha_string' => 'The title must be string.',
      'titleKr.max' => 'The title must not be greater than 500 characters.',

      'shortDescKr.required' => 'The description is required.',
      'shortDescKr.alpha_string_kr' => 'The description must be string.',
      'shortDescKr.max' => 'The description must not be greater than 1000 characters.',

      'contentKrSet.regex' => 'The format is invalid.',

      'status.required' => 'The status is required.',
      'status.in' => 'The option is incorrect.'
    ];

    $contentEnSet = $request->contentEnSet ?? '';
    if( $contentEnSet ){
      $sectionIndexes = explode(",", $contentEnSet);

      foreach ($sectionIndexes as $index) {
        switch($request["contentEnLayoutR$index"]){
          case 'layout_1': {
            $messages["contentEnHeadR$index.required"] = 'The head is required.';
            $messages["contentEnHeadR$index.alpha_string"] = 'The head must be string.';
            $messages["contentEnHeadR$index.max"] = 'The head must not be greater than 500 characters.';

            $messages["contentEnTextR$index.required"] = 'The text is required.';
            $messages["contentEnTextR$index.alpha_string"] = 'The text must be string.';
            $messages["contentEnTextR$index.max"] = 'The text must not be greater than 10000 characters.';
          }
          break;
          case 'layout_2': {
            $messages["contentEnTextR$index.required"] = 'The text is required.';
            $messages["contentEnTextR$index.alpha_string"] = 'The text must be string';
            $messages["contentEnTextR$index.max"] = 'The text must not be greater than 10000 characters.';
          }
          break;
          case 'layout_3': {
            $messages["contentEnImageR$index.required"] = 'The image is required.';

            $messages["contentEnCaptionR$index.required"] = 'The caption is required.';
            $messages["contentEnCaptionR$index.alpha_string"] = 'The caption must be string.';
            $messages["contentEnCaptionR$index.max"] = 'The caption must not be greater than 500 characters.';
          }
          break;
        }
      }
    }

    $contentKrSet = $request->contentKrSet ?? '';
    if( $contentKrSet ){
      $sectionIndexes = explode(",", $contentKrSet);

      foreach ($sectionIndexes as $index) {
        switch($request["contentKrLayoutR$index"]){
          case 'layout_1': {
            $messages["contentKrHeadR$index.required"] = 'The head is required.';
            $messages["contentKrHeadR$index.alpha_string"] = 'The head must be string.';
            $messages["contentKrHeadR$index.max"] = 'The head must not be greater than 500 characters.';

            $messages["contentKrTextR$index.required"] = 'The text is required.';
            $messages["contentKrTextR$index.alpha_string"] = 'The text must be string.';
            $messages["contentKrTextR$index.max"] = 'The text must not be greater than 10000 characters.';
          }
          break;
          case 'layout_2': {
            $messages["contentKrTextR$index.required"] = 'The text is required.';
            $messages["contentKrTextR$index.alpha_string"] = 'The text must be string.';
            $messages["contentKrTextR$index.max"] = 'The text must not be greater than 10000 characters.';
          }
          break;
          case 'layout_3': {
            $messages["contentKrImageR$index.required"] = 'The image is required.';

            $messages["contentKrCaptionR$index.required"] = 'The caption is required.';
            $messages["contentKrCaptionR$index.alpha_string"] = 'The caption must be string.';
            $messages["contentKrCaptionR$index.max"] = 'The caption must not be greater than 500 characters.';
          }
          break;
        }
      }
    }

    return $messages;
  }
}