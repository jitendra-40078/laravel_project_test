<?php

namespace App\Http\Controllers\Backend\Api\Validators\MediaLibrary;

class Group
{
  public static function rules($type, $recordId)
  {
    $rules = [];

    if( $type === 'new' ){
      $rules['name'] = 'bail|required|unique:media_library_groups,name|alpha_string|content_regex|max:255';
    }else{
      $rules['name'] = 'bail|required|unique:media_library_groups,name,'.$recordId.'|alpha_string|content_regex|max:255';
      $rules['status'] = 'bail|required|in:A,D';
    }

    return $rules;
  }

  public static function messages()
  {
    $messages = [
      'name.required' => 'The name is required.',
      'name.unique' => 'The name is already in use.',
      'name.alpha_string' => 'The name must include at least one letter.',
      'name.content_regex' => 'The name format is invalid.',
      'name.max' => 'The name must not be greater than 255 characters.',
      
      'status.required' => 'The status is required.',
      'status.in' => 'The status is invalid.'
    ];

    return $messages;
  }
}