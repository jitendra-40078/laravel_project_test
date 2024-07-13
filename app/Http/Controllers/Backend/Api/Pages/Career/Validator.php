<?php

namespace App\Http\Controllers\Backend\Api\Pages\Career;

class Validator
{
  public static function rules($request, $lang)
  {
    $rules = [
      'metaTitle' => ['bail', 'required', 'alpha_string', 'content_regex', 'max:255'],
      'metaDescription' => 'bail|required|alpha_string|content_regex|max:500',

      'sec1Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec1SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'sec1Image' => 'bail|required',

      'sec2HeadingRed' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec2Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec2Description' => 'nullable|bail|htmlpurify|max:1500',

      'sec3Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec3SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
    ];

    return $rules;
  }

  public static function messages($request)
  {
    $messages = [
      'metaTitle.required' => 'The meta title is required.',
      'metaTitle.alpha_string' => 'The meta title must include at least one letter.',
      'metaTitle.content_regex' => 'The meta title format is invalid.',
      'metaTitle.max' => 'The meta title must not be greater than 255 characters.',

      'metaDescription.required' => 'The meta description is required.',
      'metaDescription.alpha_string' => 'The meta description must be a string.',
      'metaDescription.content_regex' => 'The meta description format is invalid.',
      'metaDescription.max' => 'The meta description must not be greater than 500 characters.',

      'sec1Heading.alpha_string' => 'The heading must be a string.',
      'sec1Heading.content_regex' => 'The heading format is invalid.',
      'sec1Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec1SubHeading.alpha_string' => 'The sub heading must be a string.',
      'sec1SubHeading.content_regex' => 'The sub heading format is invalid.',
      'sec1SubHeading.max' => 'The sub heading must not be greater than 500 characters.',

      'sec1Image.required' => 'The image is required',

      'sec2HeadingRed.alpha_string' => 'The heading must be a string.',
      'sec2HeadingRed.content_regex' => 'The heading format is invalid.',
      'sec2HeadingRed.max' => 'The heading must not be greater than 255 characters.',

      'sec2Heading.alpha_string' => 'The heading must be a string.',
      'sec2Heading.content_regex' => 'The heading format is invalid.',
      'sec2Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec2Description.htmlpurify' => 'The description format is invalid.',
      'sec2Description.max' => 'The description must not be greater than 1500 characters.',

      'sec3Heading.alpha_string' => 'The heading must be a string.',
      'sec3Heading.content_regex' => 'The heading format is invalid.',
      'sec3Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec3SubHeading.alpha_string' => 'The sub heading must be a string.',
      'sec3SubHeading.content_regex' => 'The sub heading format is invalid.',
      'sec3SubHeading.max' => 'The sub heading must not be greater than 500 characters.',
    ];

    return $messages;
  }
}