<?php

namespace App\Http\Controllers\Backend\Api\Validators\Cms\Product;

class Property
{
  public static function rules($type, $recordId)
  {
    if( $type === 'existing' ){
      $rules['status'] = 'bail|required|in:A,D';
      $rules['nameEn'] = 'bail|required|unique:product_properties,nameEn,'.$recordId.'|alpha_string|content_regex|max:255';
      $rules['nameKr'] = 'bail|required|unique:product_properties,nameKr,'.$recordId.'|alpha_string|content_regex|max:255';
    }else{
      $rules['nameEn'] = 'bail|required|unique:product_properties,nameEn|alpha_string|content_regex|max:255';
      $rules['nameKr'] = 'bail|required|unique:product_properties,nameKr|alpha_string|content_regex|max:255';
    }

    return $rules;
  }

  public static function messages()
  {
    $messages = [
      'nameEn.required' => 'The name is required.',
      'nameEn.unique' => 'The name is already in use.',
      'nameEn.alpha_string' => 'The name format is invalid.',
      'nameEn.content_regex' => 'The name format is invalid.',
      'nameEn.max' => 'The name must not be greater than 255 characters.',

      'nameKr.required' => 'The name is required.',
      'nameKr.unique' => 'The name is already in use.',
      'nameKr.alpha_string' => 'The name format is invalid.',
      'nameKr.content_regex' => 'The name format is invalid.',
      'nameKr.max' => 'The name must not be greater than 255 characters.',

      'status.required' => 'The status is required.',
      'status.in' => 'The status is invalid.'
    ];

    return $messages;
  }
}