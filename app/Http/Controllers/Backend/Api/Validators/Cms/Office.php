<?php

namespace App\Http\Controllers\Backend\Api\Validators\Cms;

class Office
{
  public static function rules($language, $type, $recordId)
  {
    $rules = [
      'language' => 'bail|required|in:en,kr,both',
      'phone' => 'bail|required|phone_regex|max:100',
      'fax' => 'bail|nullable|phone_regex|max:100',
      'email' => 'bail|nullable|email|max:500',
      'map' => 'bail|required|url|starts_with:https://www.google.com/maps|regex:/^https:\/\/www\.google\.com\/maps\/embed\?pb=!/|max:1500',
    ];

    if( in_array($language, ['en', 'both'])){
      $rules['nameEn'] = 'bail|required|alpha_string|content_regex|max:255';
      $rules['addressEn'] = 'bail|required|alpha_string|content_regex|max:1000';
    }
    
    if( in_array($language, ['kr', 'both'])){
      $rules['nameKr'] = 'bail|required|alpha_string|content_regex|max:255';
      $rules['addressKr'] = 'bail|required|alpha_string|content_regex|max:1000';
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

      'phone.required' => 'The phone is required.',
      'phone.phone_regex' => 'The phone format is invalid',
      'phone.max' => 'The phone must not be greater than 100 characters.',

      'fax.phone_regex' => 'The fax format is invalid',
      'fax.max' => 'The fax must not be greater than 100 characters.',

      'email.email' => 'The email format is invalid',
      'email.max' => 'The phone must not be greater than 500 characters.',

      'map.required' => 'The map is required.',
      'map.url' => 'The url format is invalid',
      'map.starts_with' => 'The url format is invalid',
      'map.regex' => 'The url format is invalid',
      'map.max' => 'The phone must not be greater than 1500 characters.',

      'nameEn.required' => 'The name is required.',
      'nameEn.alpha_string' => 'The name must include at least one letter.',
      'nameEn.content_regex' => 'The name format is invalid.',
      'nameEn.max' => 'The name must not be greater than 255 characters.',

      'addressEn.required' => 'The address is required.',
      'addressEn.alpha_string' => 'The address must include at least one letter.',
      'addressEn.content_regex' => 'The address format is invalid.',
      'addressEn.max' => 'The address must not be greater than 1000 characters.',

      'nameKr.required' => 'The name is required.',
      'nameKr.alpha_string' => 'The name must include at least one letter.',
      'nameKr.content_regex' => 'The name format is invalid.',
      'nameKr.max' => 'The name must not be greater than 255 characters.',

      'addressKr.required' => 'The address is required.',
      'addressKr.alpha_string' => 'The address must include at least one letter.',
      'addressKr.content_regex' => 'The address format is invalid.',
      'addressKr.max' => 'The address must not be greater than 1000 characters.',

      'status.required' => 'The status is required.',
      'status.in' => 'The status is invalid.'
    ];

    return $messages;
  }
}