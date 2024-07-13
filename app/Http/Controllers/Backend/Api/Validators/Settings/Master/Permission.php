<?php

namespace App\Http\Controllers\Backend\Api\Validators\Settings\Master;

class Permission
{
  public static function rules($type, $recordId)
  {
    if( $type === 'existing' ){
      $rules['status'] = 'bail|required|in:A,D';
      $rules['name'] = 'bail|required|unique:permissions,name,'.$recordId.'|alpha_string|content_regex|max:255';
    }else{
      $rules['name'] = 'bail|required|unique:permissions,name|alpha_string|content_regex|max:255';
    }

    return $rules;
  }

  public static function messages()
  {
    $messages = [
      'name.required' => 'The name is required.',
      'name.unique' => 'The name is already in use.',
      'name.alpha_string' => 'The name must be string.',
      'name.content_regex' => 'The name should not contain invalid characters.',
      'name.max' => 'The name must not be greater than 255 characters.',

      'status.required' => 'The status is required.',
      'status.in' => 'The status is invalid.'
    ];

    return $messages;
  }
}