<?php

namespace App\Http\Controllers\Backend\Api\Pages\Company;

class Validator
{
  public static function rules($request, $lang)
  {
    $rules = [
      'metaTitle' => ['bail', 'required', 'alpha_string', 'content_regex', 'max:255'],
      'metaDescription' => 'bail|required|alpha_string|content_regex|max:500',

      'heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'subHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'bannerImage' => 'bail|required',

      'visionHeading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'visionDescription' => 'nullable|bail|htmlpurify|max:1500',
      'visionImage' => 'nullable',

      'missionHeading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'missionDescription' => 'nullable|bail|htmlpurify|max:1500',
      'missionImage' => 'nullable',

      'sec3Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec3Description' => 'nullable|bail|htmlpurify|max:3000',
      'sec3Image' => 'nullable',

      'sec4Heading' => 'nullable|bail|alpha_string|content_regex|max:255',

      'sec5Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
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

      'heading.alpha_string' => 'The heading must be a string.',
      'heading.content_regex' => 'The heading format is invalid.',
      'heading.max' => 'The heading must not be greater than 255 characters.',

      'subHeading.alpha_string' => 'The sub heading must be a string.',
      'subHeading.content_regex' => 'The sub heading format is invalid.',
      'subHeading.max' => 'The sub heading must not be greater than 500 characters.',

      'bannerImage.required' => 'The banner image is required',

      'visionHeading.alpha_string' => 'The heading must be a string.',
      'visionHeading.content_regex' => 'The heading format is invalid.',
      'visionHeading.max' => 'The heading must not be greater than 255 characters.',

      'visionDescription.htmlpurify' => 'The description format is invalid.',
      'visionDescription.max' => 'The description must not be greater than 1500 characters.',

      'missionHeading.alpha_string' => 'The heading must be a string.',
      'missionHeading.content_regex' => 'The heading format is invalid.',
      'missionHeading.max' => 'The heading must not be greater than 255 characters.',

      'missionDescription.htmlpurify' => 'The description format is invalid.',
      'missionDescription.max' => 'The description must not be greater than 1500 characters.',

      'sec3Heading.alpha_string' => 'The heading must be a string.',
      'sec3Heading.content_regex' => 'The heading format is invalid.',
      'sec3Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec3Description.htmlpurify' => 'The description format is invalid.',
      'sec3Description.max' => 'The description must not be greater than 3000 characters.',

      'sec4Heading.alpha_string' => 'The heading must be a string.',
      'sec4Heading.content_regex' => 'The heading format is invalid.',
      'sec4Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec5Heading.alpha_string' => 'The heading must be a string.',
      'sec5Heading.content_regex' => 'The heading format is invalid.',
      'sec5Heading.max' => 'The heading must not be greater than 255 characters.',
    ];

    return $messages;
  }
}