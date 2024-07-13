<?php

namespace App\Http\Controllers\Backend\Api\Validators\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Account
{
  public static function rules($form, $recordId)
  {
    if( $form === 'profile' ){
      $rules = [ 
        'name' => 'bail|required|unique:admins,name,'.$recordId.'|alpha_string|content_regex|max:50',
        'email' => 'bail|required|unique:admins,email,'.$recordId.'|email|email_check|max:255',
        'username' => 'bail|required|unique:admins,username,'.$recordId.'|min:8|credential_check|max:50'
      ];
    }else{
      $rules = [ 
        'newPassword' => 'bail|required|min:8|credential_check|max:50',
        'cnfPassword' => 'bail|required|same:newPassword|min:8|credential_check|max:50',
        'oldPassword' => [
          'bail',
          'required',
          'min:8',
          'credential_check',
          'max:50',
          function ($attribute, $value, $fail) {
            if (!Hash::check($value, Auth::user()->password_enc)) {
              $fail('The password is incorrect.');
            }
          }
        ]
      ];
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
      'name.max' => 'The name must not be greater than 50 characters.',

      'email.required' => 'The email is required.',
      'email.unique' => 'The email is already in use.',
      'email.email' => 'The email id is incorrect.',
      'email.email_check' => 'The email id is incorrect.',
      'email.max' => 'The email must not be greater than 255 characters.',

      'username.required' => 'The username is required.',
      'username.unique' => 'The username is already in use.',
      'username.credential_check' => 'The username must contain letters and digits, include at least one uppercase letter, and only special characters @, $, ! are allowed.',
      'username.min' => 'The username must contain atleast 8 characters.',
      'username.max' => 'The username must not be greater than 50 characters.',

      'oldPassword.required' => 'The password is required.',
      'oldPassword.credential_check' => 'The password must contain letters and digits, include at least one uppercase letter, and only special characters @, $, ! are allowed.',
      'oldPassword.min' => 'The password must contain atleast 8 characters.',
      'oldPassword.max' => 'The password must not be greater than 50 characters.',

      'newPassword.required' => 'The password is required.',
      'newPassword.credential_check' => 'The password must contain letters and digits, include at least one uppercase letter, and only special characters @, $, ! are allowed.',
      'newPassword.min' => 'The password must contain atleast 8 characters.',
      'newPassword.max' => 'The password must not be greater than 50 characters.',

      'cnfPassword.required' => 'The password is required.',
      'cnfPassword.credential_check' => 'The password must contain letters and digits, include at least one uppercase letter, and only special characters @, $, ! are allowed.',
      'cnfPassword.same' => 'The password do not match.',
      'cnfPassword.min' => 'The password must contain atleast 8 characters.',
      'cnfPassword.max' => 'The password must not be greater than 50 characters.',
    ];

    return $messages;
  }
}