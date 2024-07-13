<?php

namespace App\Http\Controllers\Backend\Api\Pages\News;

class Validator
{
  public static function rules($request, $lang)
  {
    $rules = [
      'metaTitle' => ['bail', 'required', 'alpha_string', 'content_regex', 'max:255'],
      'metaDescription' => 'bail|required|alpha_string|content_regex|max:500',

      'sec1Image' => 'bail|required',
      'sec1Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'labelReadMore' => 'nullable|bail|alpha_string|content_regex|max:255',
      'labelAll' => 'nullable|bail|alpha_string|content_regex|max:255',
      'labelNews' => 'nullable|bail|alpha_string|content_regex|max:255',
      'labelPress' => 'nullable|bail|alpha_string|content_regex|max:255',
      'labelLoadMore' => 'nullable|bail|alpha_string|content_regex|max:255',

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

      'sec1Image.required' => 'The image is required.',

      'sec1Heading.alpha_string' => 'The heading must be a string.',
      'sec1Heading.content_regex' => 'The heading format is invalid.',
      'sec1Heading.max' => 'The heading must not be greater than 255 characters.',

      'labelReadMore.alpha_string' => 'The label must be a string.',
      'labelReadMore.content_regex' => 'The label format is invalid.',
      'labelReadMore.max' => 'The label must not be greater than 255 characters.',

      'labelAll.alpha_string' => 'The label must be a string.',
      'labelAll.content_regex' => 'The label format is invalid.',
      'labelAll.max' => 'The label must not be greater than 255 characters.',

      'labelNews.alpha_string' => 'The label must be a string.',
      'labelNews.content_regex' => 'The label format is invalid.',
      'labelNews.max' => 'The label must not be greater than 255 characters.',

      'labelPress.alpha_string' => 'The label must be a string.',
      'labelPress.content_regex' => 'The label format is invalid.',
      'labelPress.max' => 'The label must not be greater than 255 characters.',

      'labelLoadMore.alpha_string' => 'The label must be a string.',
      'labelLoadMore.content_regex' => 'The label format is invalid.',
      'labelLoadMore.max' => 'The label must not be greater than 255 characters.',

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