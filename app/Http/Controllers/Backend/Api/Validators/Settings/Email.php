<?php

namespace App\Http\Controllers\Backend\Api\Validators\Settings;

class Email
{
  public static function rules($key)
  {
    $rules = [];

    if( $key === "mail-smtp" ){
      $rules['smtpHost'] = 'bail|required';
      $rules['smtpPort'] = 'bail|required|regex:/^[0-9,]+$/|max:6';
      $rules['smtpUsername'] = 'bail|required';
      $rules['smtpPassword'] = 'bail|required';
    }

    if( $key === "mail-career-enquiry" ){
      $rules['careerSubject'] = 'bail|required|string|content_regex';

      $rules['careerToEmail'] = [
        'bail',
        'required',
        'string',
        function($attribute, $value, $fail) {
          $emails = array_map('trim', explode(',', $value));
          foreach ($emails as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              return $fail('The field contains an invalid email address: ' . $email);
            }
          }
        },
      ];

      $rules['careerCcEmail'] = [
        'bail',
        'nullable',
        'string',
        function($attribute, $value, $fail) {
          $emails = array_map('trim', explode(',', $value));
          foreach ($emails as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              return $fail('The field contains an invalid email address: ' . $email);
            }
          }
        },
      ];
    }

    if( $key === "mail-contact-enquiry" ){
      $rules['contactSubject'] = 'bail|required|string|content_regex';

      $rules['contactToEmail'] = [
        'bail',
        'required',
        'string',
        function($attribute, $value, $fail) {
          $emails = array_map('trim', explode(',', $value));
          foreach ($emails as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              return $fail('The field contains an invalid email address: ' . $email);
            }
          }
        },
      ];

      $rules['contactCcEmail'] = [
        'bail',
        'nullable',
        'string',
        function($attribute, $value, $fail) {
          $emails = array_map('trim', explode(',', $value));
          foreach ($emails as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              return $fail('The field contains an invalid email address: ' . $email);
            }
          }
        },
      ];
    }
   
    return $rules;
  }

  public static function messages()
  {
    $messages = [
      'smtpHost.required' => 'The host is required.',

      'smtpPort.required' => 'The port is required.',
      'smtpPort.regex' => 'The port is incorrect.',
      'smtpPort.max' => 'The port is incorrect.',

      'smtpUsername.required' => 'The username is required.',
      'smtpPassword.required' => 'The password is required.',

      'careerSubject.required' => 'The subject is required.',
      'careerSubject.string' => 'The subject must be string.',
      'careerSubject.content_regex' => 'The subject must be a valid string.',

      'careerToEmail.required' => 'The emails are required.',
      'careerToEmail.string' => 'The emails must be string.',

      'careerCcEmail.required' => 'The emails are required.',
      'careerCcEmail.string' => 'The emails must be string.',

      'contactSubject.required' => 'The subject is required.',
      'contactSubject.string' => 'The subject must be string.',
      'contactSubject.content_regex' => 'The subject must be a valid string.',

      'contactToEmail.required' => 'The emails are required.',
      'contactToEmail.string' => 'The emails must be string.',

      'contactCcEmail.required' => 'The emails are required.',
      'contactCcEmail.string' => 'The emails must be string.',
    ];

    return $messages;
  }
}