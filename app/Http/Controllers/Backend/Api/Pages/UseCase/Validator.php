<?php

namespace App\Http\Controllers\Backend\Api\Pages\UseCase;

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

      'sec2HeadingRed' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec2Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec2SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'sec2Image' => 'nullable',
      'useCaseSection2Set' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec3Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec3SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
    ];

    $section2set = $request->useCaseSection2Set ?? '';
    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $rules["useCaseSection2HeadR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
        $rules["useCaseSection2ImageR$index"] = 'nullable';
      }
    }

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

      'sec2HeadingRed.alpha_string' => 'The heading must be a string.',
      'sec2HeadingRed.content_regex' => 'The heading format is invalid.',
      'sec2HeadingRed.max' => 'The heading must not be greater than 255 characters.',

      'sec2Heading.alpha_string' => 'The heading must be a string.',
      'sec2Heading.content_regex' => 'The heading format is invalid.',
      'sec2Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec2SubHeading.alpha_string' => 'The sub heading must be a string.',
      'sec2SubHeading.content_regex' => 'The sub heading format is invalid.',
      'sec2SubHeading.max' => 'The sub heading must not be greater than 500 characters.',

      'useCaseSection2Set.regex' => 'The format is invalid.',

      'sec3Heading.alpha_string' => 'The heading must be a string.',
      'sec3Heading.content_regex' => 'The heading format is invalid.',
      'sec3Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec3SubHeading.alpha_string' => 'The sub heading must be a string.',
      'sec3SubHeading.content_regex' => 'The sub heading format is invalid.',
      'sec3SubHeading.max' => 'The sub heading must not be greater than 500 characters.',
    ];

    $section2set = $request->useCaseSection2Set ?? '';
    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $messages["useCaseSection2HeadR$index.alpha_string"] = 'The heading must be a string.';
        $messages["useCaseSection2HeadR$index.content_regex"] = 'The heading format is invalid.';
        $messages["useCaseSection2HeadR$index.max"] = 'The heading must not be greater than 255 characters.';

      }
    }

    return $messages;
  }
}