<?php

namespace App\Http\Controllers\Backend\Api\Validators\Cms\Blogs;

class Category
{
  public static function rules($type, $recordId)
  {
    if( $type === 'existing' ){
      $rules['status'] = 'bail|required|in:A,D';
      $rules['nameEn'] = 'bail|required|unique:blog_categories,nameEn,'.$recordId.'|alpha_string|max:255';
      $rules['nameKr'] = 'bail|required|unique:blog_categories,nameKr,'.$recordId.'|alpha_string|max:255';
    }else{
      $rules['nameEn'] = 'bail|required|unique:blog_categories,nameEn|alpha_string|max:255';
      $rules['nameKr'] = 'bail|required|unique:blog_categories,nameKr|alpha_string|max:255';
    }

    return $rules;
  }

  public static function messages()
  {
    $messages = [
      'nameEn.required' => 'The name is required.',
      'nameEn.unique' => 'The name is already in use.',
      'nameEn.alpha_string' => 'The name must be string.',
      'nameEn.max' => 'The name must not be greater than 255 characters.',

      'nameKr.required' => 'The name is required.',
      'nameKr.unique' => 'The name is already in use.',
      'nameKr.alpha_string' => 'The name must be string.',
      'nameKr.max' => 'The name must not be greater than 255 characters.',

      'status.required' => 'The status is required.',
      'status.in' => 'The status is incorrect.'
    ];

    return $messages;
  }
}