<?php

namespace App\Http\Controllers\Backend\Api\Validators\Cms;

class Milestone
{
  public static function rules($language, $type, $recordId)
  {
    $rules = [
      'language' => 'bail|required|in:en,kr,both',
      'monthYearPicker' => [
        'bail',
        'required',
        function ($attribute, $value, $fail) {
          // Split the input into parts
          $parts = explode(' ', $value);

          // Check if the input has exactly two parts
          if (count($parts) !== 2) {
            return $fail('The month and year must be in the format "Month YYYY".');
          }

          list($monthName, $year) = $parts;

          // Validate the year
          if (!preg_match('/^\d{4}$/', $year)) {
            return $fail('The year must be four digits.');
          }

          // Convert the month name to a month number (1-12)
          $month = date('m', strtotime($monthName . " 1"));

          // Check if the date is valid
          if (!checkdate($month, 1, $year)) {
            return $fail('The month and year is not a valid combination.');
          }
        },
      ]
    ];

    if( in_array($language, ['en', 'both'])){
      $rules['contentEn'] = 'bail|required|alpha_string|htmlpurify|max:2000';
    }
    
    if( in_array($language, ['kr', 'both'])){
      $rules['contentKr'] = 'bail|required|alpha_string|htmlpurify|max:2000';
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

      'monthYearPicker.required' => 'The month and year is required.',

      'contentEn.required' => 'The content is required.',
      'contentEn.alpha_string' => 'The content must include at least one letter.',
      'contentEn.htmlpurify' => 'The content format is invalid.',
      'contentEn.max' => 'The content must not be greater than 2000 characters.',

      'contentKr.required' => 'The content is required.',
      'contentKr.alpha_string' => 'The content must include at least one letter.',
      'contentKr.htmlpurify' => 'The content format is invalid.',
      'contentKr.max' => 'The content must not be greater than 2000 characters.',

      'status.required' => 'The status is required.',
      'status.in' => 'The status is invalid.'
    ];

    return $messages;
  }
}