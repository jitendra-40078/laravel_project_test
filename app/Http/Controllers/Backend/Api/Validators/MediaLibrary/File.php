<?php

namespace App\Http\Controllers\Backend\Api\Validators\MediaLibrary;

class File
{
  public static function rules()
  {
    $rules = [
      'media' => 'required|file|mimes:png,jpg,jpeg,gif,svg,pdf,doc,docx,xls,xlsx,mp4,mp3|max:102400',
      'mediaGroupId' => 'nullable|integer'
    ];

    return $rules;
  }

  public static function messages()
  {
    $messages = [
      'media.required' => 'The file is required.',
      'media.file' => 'The file is invalid.',
      'media.mimes' => 'The file type is not allowed.',
      'media.max' => 'You have exceeds the maximum upload limit of 100mb.',

      'mediaGroupId.integer' => 'The group id is invalid'
    ];

    return $messages;
  }
}