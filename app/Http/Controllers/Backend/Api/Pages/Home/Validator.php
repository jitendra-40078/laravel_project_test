<?php

namespace App\Http\Controllers\Backend\Api\Pages\Home;

class Validator
{
  public static function rules($request, $lang)
  {
    $rules = [
      'metaTitle' => ['bail', 'required', 'alpha_string', 'content_regex', 'max:255'],
      'metaDescription' => 'bail|required|alpha_string|content_regex|max:500',

      'heading1' => 'nullable|bail|alpha_string|content_regex|max:255',
      'heading2' => 'nullable|bail|alpha_string|content_regex|max:255',
      'counterText' => 'nullable|bail|alpha_string|content_regex|max:255',
      'counterUnit' => 'nullable|bail|alpha|max:10',
      'bannerImage' => 'bail|required',
  
      'sec2RedHeading' => 'nullable|bail|alpha_string|content_regex|max:50',
      'sec2Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec2SubHeading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'homeSection2Set' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec3Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec3HeadingRed' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec3SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'sec3Image' => 'nullable',
      'homeSection3Set' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec4Heading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'secSub4Heading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'sec4BtnText' => 'nullable|bail|alpha_string|content_regex|max:100',
      'sec4BtnLink' => 'nullable|bail|url|active_url',
      'homeSection4Set' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec5Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec5SubHeading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec5BtnText' => 'nullable|bail|alpha_string|content_regex|max:100',
      'sec5BtnLink' => 'nullable|bail|url|active_url',

      'sec6Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec6HeadingRed' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec6SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
    
      'sec7Image' => 'nullable',
      'sec7BoxText' => 'bail|nullable|alpha_string|content_regex|max:255',
      'sec7BtnText' => 'bail|nullable|alpha_string|content_regex|max:255',
    ];

    $section2set = $request->homeSection2Set ?? '';
    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $rules["homeSection2HeadR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
        $rules["homeSection2DescR$index"] = 'nullable|bail|htmlpurify|max:1000';
        $rules["homeSection2ImageR$index"] = 'nullable';
      }
    }

    $homeSection3Set = $request->homeSection3Set ?? '';
    if( $homeSection3Set ){
      $sectionIndexes = explode(",", $homeSection3Set);
      foreach ($sectionIndexes as $index) {
        $rules["homeSection3HeadR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
        $rules["homeSection3TextR$index"] = 'nullable|bail|alpha_string|content_regex|max:500';
      }
    }

    $homeSection4Set = $request->homeSection4Set ?? '';
    if( $homeSection4Set ){
      $sectionIndexes = explode(",", $homeSection4Set);
      foreach ($sectionIndexes as $index) {
        $rules["homeSection4HeadR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
        $rules["homeSection4ImageR$index"] = 'nullable';

        for($i=1; $i<=3; $i++){
          $rules['homeSection4TextR'.$index.'C'.$i] = 'nullable|bail|alpha_string|content_regex|max:255';
          $rules['homeSection4IconR'.$index.'C'.$i] = 'nullable';
        }
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

      'heading1.alpha_string' => 'The heading must be a string.',
      'heading1.content_regex' => 'The heading format is invalid.',
      'heading1.max' => 'The heading must not be greater than 255 characters.',

      'heading2.alpha_string' => 'The heading must be a string.',
      'heading2.content_regex' => 'The heading format is invalid.',
      'heading2.max' => 'The heading must not be greater than 255 characters.',

      'counterText.alpha_string' => 'The text must be a string.',
      'counterText.content_regex' => 'The text format is invalid.',
      'counterText.max' => 'The text must not be greater than 255 characters.',

      'counterUnit.alpha_string' => 'The text must be a string.',
      'counterUnit.content_regex' => 'The text format is invalid.',
      'counterUnit.max' => 'The text must not be greater than 10 characters.',

      'bannerImage.required' => 'The banner image/video is required',

      'sec2RedHeading.alpha_string' => 'The heading must be a string.',
      'sec2RedHeading.content_regex' => 'The heading format is invalid.',
      'sec2RedHeading.max' => 'The heading must not be greater than 255 characters.',

      'sec2Heading.alpha_string' => 'The heading must be a string.',
      'sec2Heading.content_regex' => 'The heading format is invalid.',
      'sec2Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec2SubHeading.alpha_string' => 'The heading must be a string.',
      'sec2SubHeading.content_regex' => 'The heading format is invalid.',
      'sec2SubHeading.max' => 'The heading must not be greater than 255 characters.',

      'homeSection2Set.regex' => 'The format is invalid.',

      'sec3Heading.alpha_string' => 'The heading must be a string.',
      'sec3Heading.content_regex' => 'The heading format is invalid.',
      'sec3Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec3HeadingRed.alpha_string' => 'The heading must be a string.',
      'sec3HeadingRed.content_regex' => 'The heading format is invalid.',
      'sec3HeadingRed.max' => 'The heading must not be greater than 255 characters.',

      'sec3SubHeading.alpha_string' => 'The heading must be a string.',
      'sec3SubHeading.content_regex' => 'The heading format is invalid.',
      'sec3SubHeading.max' => 'The heading must not be greater than 500 characters.',

      'homeSection3Set.regex' => 'The format is invalid.',

      'sec4Heading.alpha_string' => 'The heading must be a string.',
      'sec4Heading.content_regex' => 'The heading format is invalid.',
      'sec4Heading.max' => 'The heading must not be greater than 500 characters.',

      'secSub4Heading.alpha_string' => 'The heading must be a string.',
      'secSub4Heading.content_regex' => 'The heading format is invalid.',
      'secSub4Heading.max' => 'The heading must not be greater than 500 characters.',

      'sec4BtnText.alpha_string' => 'The heading must be a string.',
      'sec4BtnText.content_regex' => 'The heading format is invalid.',
      'sec4BtnText.max' => 'The heading must not be greater than 100 characters.',

      'sec4BtnLink.url' => 'The link format is invalid.',
      'sec4BtnLink.active_url' => 'The link is not an active URL.',

      'homeSection4Set.regex' => 'The format is invalid.',

      'sec5Heading.alpha_string' => 'The heading must be a string.',
      'sec5Heading.content_regex' => 'The heading format is invalid.',
      'sec5Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec5SubHeading.alpha_string' => 'The heading must be a string.',
      'sec5SubHeading.content_regex' => 'The heading format is invalid.',
      'sec5SubHeading.max' => 'The heading must not be greater than 255 characters.',

      'sec5BtnText.alpha_string' => 'The heading must be a string.',
      'sec5BtnText.content_regex' => 'The heading format is invalid.',
      'sec5BtnText.max' => 'The heading must not be greater than 100 characters.',

      'sec5BtnLink.url' => 'The link format is invalid.',
      'sec5BtnLink.active_url' => 'The link is not an active URL.',

      'sec6Heading.alpha_string' => 'The heading must be a string.',
      'sec6Heading.content_regex' => 'The heading format is invalid.',
      'sec6Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec6HeadingRed.alpha_string' => 'The heading must be a string.',
      'sec6HeadingRed.content_regex' => 'The heading format is invalid.',
      'sec6HeadingRed.max' => 'The heading must not be greater than 255 characters.',
      
      'sec6SubHeading.alpha_string' => 'The heading must be a string.',
      'sec6SubHeading.content_regex' => 'The heading format is invalid.',
      'sec6SubHeading.max' => 'The heading must not be greater than 500 characters.',

      'sec7BoxText.alpha_string' => 'The text must be a string.',
      'sec7BoxText.content_regex' => 'The text format is invalid.',
      'sec7BoxText.max' => 'The text must not be greater than 500 characters.',

      'sec7BtnText.alpha_string' => 'The text must be a string.',
      'sec7BtnText.content_regex' => 'The text format is invalid.',
      'sec7BtnText.max' => 'The text must not be greater than 500 characters.',
    ];

    $section2set = $request->homeSection2Set ?? '';
    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $messages["homeSection2HeadR$index.alpha_string"] = 'The heading must be a string.';
        $messages["homeSection2HeadR$index.content_regex"] = 'The heading format is invalid.';
        $messages["homeSection2HeadR$index.max"] = 'The heading must not be greater than 255 characters.';

        $messages["homeSection2DescR$index.htmlpurify"] = 'The description format is invalid.';
        $messages["homeSection2DescR$index.max"] = 'The description must not be greater than 1000 characters.';
      }
    }

    $section3set = $request->homeSection3Set ?? '';
    if( $section3set ){
      $sectionIndexes = explode(",", $section3set);
      foreach ($sectionIndexes as $index) {
        $messages["homeSection3HeadR$index.alpha_string"] = 'The heading must be a string.';
        $messages["homeSection3HeadR$index.content_regex"] = 'The heading format is invalid.';
        $messages["homeSection3HeadR$index.max"] = 'The heading must not be greater than 255 characters.';

        $messages["homeSection3TextR$index.alpha_string"] = 'The text must be a string.';
        $messages["homeSection3TextR$index.content_regex"] = 'The text format is invalid.';
        $messages["homeSection3TextR$index.max"] = 'The text must not be greater than 500 characters.';
      }
    }

    $section4set = $request->homeSection4Set ?? '';
    if( $section4set ){
      $sectionIndexes = explode(",", $section4set);
      foreach ($sectionIndexes as $index) {
        $messages["homeSection4HeadR$index.alpha_string"] = 'The heading must be a string.';
        $messages["homeSection4HeadR$index.content_regex"] = 'The heading format is invalid.';
        $messages["homeSection4HeadR$index.max"] = 'The heading must not be greater than 255 characters.';

        for($i=1; $i<=3; $i++){
          $messages['homeSection4TextR'.$index.'C'.$i.'.alpha_string'] = 'The text must be a string.';
          $messages['homeSection4TextR'.$index.'C'.$i.'.content_regex'] = 'The text format is invalid.';
          $messages['homeSection4TextR'.$index.'C'.$i.'.max'] = 'The text must not be greater than 255 characters.';
        }
      }
    }

    return $messages;
  }
}