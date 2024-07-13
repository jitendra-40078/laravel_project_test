<?php

namespace App\Http\Controllers\Backend\Api\Validators\Cms;

class Leadership
{
  public static function rules($language, $type, $recordId)
  {
    $rules = [
      'language' => 'bail|required|in:en,kr,both',
    ];

    if( in_array($language, ['en', 'both'])){
      $rules['imageEn'] = 'bail|required';
      $rules['nameEn'] = 'bail|required|alpha_string|content_regex|max:255';
      $rules['designationEn'] = 'bail|nullable|alpha_string|content_regex|max:255';
      $rules['descriptionEn'] = 'bail|required|alpha_string|htmlpurify|max:1500';
    }
    
    if( in_array($language, ['kr', 'both'])){
      $rules['imageKr'] = 'bail|required';
      $rules['nameKr'] = 'bail|required|alpha_string|content_regex|max:255';
      $rules['designationKr'] = 'bail|nullable|alpha_string|content_regex|max:255';
      $rules['descriptionKr'] = 'bail|required|alpha_string|htmlpurify|max:1500';
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

      'imageEn.required' => 'The image is required.',

      'nameEn.required' => 'The name is required.',
      'nameEn.alpha_string' => 'The name must be string.',
      'nameEn.content_regex' => 'The name contains invalid characters.',
      'nameEn.max' => 'The name must not be greater than 255 characters.',

      'designationEn.alpha_string' => 'The designation must be string.',
      'designationEn.content_regex' => 'The designation contains invalid characters.',
      'designationEn.max' => 'The designation must not be greater than 255 characters.',

      'descriptionEn.required' => 'The description is required.',
      'descriptionEn.alpha_string' => 'The description must be string.',
      'descriptionEn.htmlpurify' => 'The description contains invalid characters.',
      'descriptionEn.max' => 'The description must not be greater than 1500 characters.',

      'imageKr.required' => 'The image is required.',

      'nameKr.required' => 'The name is required.',
      'nameKr.alpha_string' => 'The name must be string.',
      'nameKr.content_regex' => 'The name contains invalid characters.',
      'nameKr.max' => 'The name must not be greater than 255 characters.',

      'designationKr.alpha_string' => 'The designation must be string.',
      'designationKr.content_regex' => 'The designation contains invalid characters.',
      'designationKr.max' => 'The designation must not be greater than 255 characters.',

      'descriptionKr.required' => 'The description is required.',
      'descriptionKr.alpha_string' => 'The description must be string.',
      'descriptionKr.htmlpurify' => 'The description contains invalid characters.',
      'descriptionKr.max' => 'The description must not be greater than 1500 characters.',

      'status.required' => 'The status is required.',
      'status.in' => 'The status is invalid.'
    ];

    return $messages;
  }
}