<?php

namespace App\Http\Controllers\Backend\Api\Validators;

class Auth
{
  public static function rules()
  {
    $rules = [
      "username" => 'bail|required|alpha_string|content_regex',
      "password" => 'bail|required|alpha_string|content_regex'
    ];

    return $rules;
  }

  public static function messages()
  {
    $messages = [
      'username.required' => 'The username is required.',
      'username.alpha_string' => 'The username must be string.',
      'username.content_regex' => 'The username should not contain invalid characters.',

      'password.required' => 'The password is required.',
      'password.alpha_string' => 'The password must be string.',
      'password.content_regex' => 'The password should not contain invalid characters.',
    ];

    return $messages;
  }
}