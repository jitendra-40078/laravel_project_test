<?php

namespace App\Http\Controllers\Backend\Api\Validators\Cms;

class CaseStudy
{
  public static function rules($language, $type, $recordId)
  {
    $rules = [
      'language' => 'bail|required|in:en,kr,both',
      'duration' => 'bail|nullable|content_regex|max:255',
    ];

    if( in_array($language, ['en', 'both'])){
      $rules['imageEn'] = 'bail|required';
      $rules['logoEn'] = 'bail|nullable';
      $rules['reportEn'] = 'bail|nullable';
      $rules['titleEn'] = 'bail|required|alpha_string|content_regex|max:255';
      $rules['contentEn'] = 'bail|required|alpha_string|content_regex|max:1000';
    }
    
    if( in_array($language, ['kr', 'both'])){
      $rules['imageKr'] = 'bail|required';
      $rules['logoKr'] = 'bail|nullable';
      $rules['reportKr'] = 'bail|nullable';
      $rules['titleKr'] = 'bail|required|alpha_string|content_regex|max:255';
      $rules['contentKr'] = 'bail|required|alpha_string|content_regex|max:1000';
    }

    if( $type === 'existing' ){
      $rules['status'] = 'bail|required|in:A,D';
    }

    return $rules;
  }

  public static function messages()
  {
    $messages = [
      'language.required' => 'The language is required.',
      'language.in' => 'The language is invalid.',

      'duration.content_regex' => 'The title format is invalid.',
      'duration.max' => 'The title must not be greater than 255 characters.',

      'imageEn.required' => 'The image is required.',

      'titleEn.required' => 'The title is required.',
      'titleEn.alpha_string' => 'The title must include at least one letter.',
      'titleEn.content_regex' => 'The title format is invalid.',
      'titleEn.max' => 'The title must not be greater than 255 characters.',

      'contentEn.required' => 'The content is required.',
      'contentEn.alpha_string' => 'The content must include at least one letter.',
      'contentEn.content_regex' => 'The content format is invalid.',
      'contentEn.max' => 'The content must not be greater than 1000 characters.',

      'imageKr.required' => 'The image is required.',

      'titleKr.required' => 'The title is required.',
      'titleKr.alpha_string' => 'The title must include at least one letter.',
      'titleKr.content_regex' => 'The title format is invalid.',
      'titleKr.max' => 'The title must not be greater than 255 characters.',

      'contentKr.required' => 'The content is required.',
      'contentKr.alpha_string' => 'The content must include at least one letter.',
      'contentKr.content_regex' => 'The content format is invalid.',
      'contentKr.max' => 'The content must not be greater than 1000 characters.',

      'status.required' => 'The status is required.',
      'status.in' => 'The status is invalid.'
    ];

    return $messages;
  }
}