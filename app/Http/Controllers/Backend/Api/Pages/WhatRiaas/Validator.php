<?php

namespace App\Http\Controllers\Backend\Api\Pages\WhatRiaas;

class Validator
{
  public static function rules($request, $lang)
  {
    $rules = [
      'metaTitle' => ['bail', 'required', 'alpha_string', 'content_regex', 'max:255'],
      'metaDescription' => 'bail|required|alpha_string|content_regex|max:500',

      'heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'bannerImage' => 'bail|required',

      'sec2Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec2SubHeading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'riaasSection2Set' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec3HeadingRed' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec3Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec3SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'sec3BtnText' => 'nullable|bail|alpha_string|content_regex|max:100',

      // 'sec3Pr1Name' => 'bail|required|alpha_string|content_regex|max:255',
      // 'sec3Pr1Text' => 'bail|nullable|alpha_string|content_regex|max:255',
      // 'sec3Pr1Desc' => 'bail|required|alpha_string|htmlpurify|max:1500',
      // 'sec3Pr1Image' => 'bail|required',

      // 'sec3Pr2Name' => 'bail|required|alpha_string|content_regex|max:255',
      // 'sec3Pr2Text' => 'bail|nullable|alpha_string|content_regex|max:255',
      // 'sec3Pr2Desc' => 'bail|required|alpha_string|htmlpurify|max:1500',
      // 'sec3Pr2Image' => 'bail|required',

      // 'riaasSec3FeatSet' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec4HeadingRed' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec4Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec4SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'riaasSection4Set' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec5Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec5SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'riaasSection5Set' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec5Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec5SubHeading' => 'nullable|bail|alpha_string|content_regex|max:500',
      'riaasSection5Set' => 'nullable|bail|regex:/^[0-9,]+$/',

      'sec6HeadingRed' => 'nullable|bail|alpha_string|content_regex|max:255',
      'sec6Heading' => 'nullable|bail|alpha_string|content_regex|max:255',
    ];

    $section2set = $request->riaasSection2Set ?? '';
    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $rules["riaasSection2HeadR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
        $rules["riaasSection2ImageR$index"] = 'nullable';
      }
    }

    // $section3FeatSet = $request->riaasSec3FeatSet ?? '';
    // if( $section3FeatSet ){
    //   $sectionIndexes = explode(",", $section3FeatSet);
    //   foreach ($sectionIndexes as $index) {
    //     $rules["riaasSec3FeatHeadR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
    //     $rules["riaasSec3FeatTextR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
    //     $rules["riaasSec3FeatImageR$index"] = 'nullable';
    //   }
    // }

    $section4set = $request->riaasSection4Set ?? '';
    if( $section4set ){
      $sectionIndexes = explode(",", $section4set);
      foreach ($sectionIndexes as $index) {
        $rules["riaasSection4HeadR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
        $rules["riaasSection4ImageR$index"] = 'nullable';
        $rules["riaasSection4IconR$index"] = 'nullable';
      }
    }

    $section5set = $request->riaasSection5Set ?? '';
    if( $section5set ){
      $sectionIndexes = explode(",", $section5set);
      foreach ($sectionIndexes as $index) {
        $rules["riaasSection5HeadR$index"] = 'nullable|bail|alpha_string|content_regex|max:255';
        $rules["riaasSection5ImageR$index"] = 'nullable';
      }
    }

    for($i=1; $i<=3; $i++){
      $rules["riassSection6TitleR{$i}"] = 'nullable|bail|alpha_string|content_regex|max:255';

      for($j=1; $j<= ($i==3?1:2); $j++){
        $rules["riassSection6IconBlueR{$i}C{$j}"] = 'nullable';
        $rules["riassSection6IconWhiteR{$i}C{$j}"] = 'nullable';
        $rules["riassSection6HeadR{$i}C{$j}"] = 'nullable|bail|alpha_string|content_regex|max:255';
        $rules["riassSection6TextR{$i}C{$j}"] = 'bail|nullable|alpha_string|htmlpurify|max:1500';
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

      'bannerImage.required' => 'The banner image is required',

      'sec2Heading.alpha_string' => 'The heading must be a string.',
      'sec2Heading.content_regex' => 'The heading format is invalid.',
      'sec2Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec2SubHeading.alpha_string' => 'The heading must be a string.',
      'sec2SubHeading.content_regex' => 'The heading format is invalid.',
      'sec2SubHeading.max' => 'The heading must not be greater than 255 characters.',
      
      'riaasSection2Set.regex' => 'The format is invalid.',

      'sec3HeadingRed.alpha_string' => 'The heading must be a string.',
      'sec3HeadingRed.content_regex' => 'The heading format is invalid.',
      'sec3HeadingRed.max' => 'The heading must not be greater than 255 characters.',

      'sec3Heading.alpha_string' => 'The heading must be a string.',
      'sec3Heading.content_regex' => 'The heading format is invalid.',
      'sec3Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec3SubHeading.alpha_string' => 'The sub heading must be a string.',
      'sec3SubHeading.content_regex' => 'The sub heading format is invalid.',
      'sec3SubHeading.max' => 'The sub heading must not be greater than 500 characters.',

      'sec3BtnText.alpha_string' => 'The text must be a string.',
      'sec3BtnText.content_regex' => 'The text format is invalid.',
      'sec3BtnText.max' => 'The text must not be greater than 100 characters.',

      // 'sec3Pr1Name.required' => 'The name is required.',
      // 'sec3Pr1Name.alpha_string' => 'The name must be a string.',
      // 'sec3Pr1Name.content_regex' => 'The name format is invalid.',
      // 'sec3Pr1Name.max' => 'The name must not be greater than 255 characters.',

      // 'sec3Pr1Text.alpha_string' => 'The text must be a string.',
      // 'sec3Pr1Text.content_regex' => 'The text format is invalid.',
      // 'sec3Pr1Text.max' => 'The text must not be greater than 255 characters.',

      // 'sec3Pr1Desc.required' => 'The description is required.',
      // 'sec3Pr1Desc.alpha_string' => 'The description must be a string.',
      // 'sec3Pr1Desc.htmlpurify' => 'The description format is invalid.',
      // 'sec3Pr1Desc.max' => 'The description must not be greater than 1500 characters.',

      // 'sec3Pr1Image.required' => 'The image is required.',

      // 'sec3Pr2Name.required' => 'The name is required.',
      // 'sec3Pr2Name.alpha_string' => 'The name must be a string.',
      // 'sec3Pr2Name.content_regex' => 'The name format is invalid.',
      // 'sec3Pr2Name.max' => 'The name must not be greater than 255 characters.',

      // 'sec3Pr2Text.alpha_string' => 'The text must be a string.',
      // 'sec3Pr2Text.content_regex' => 'The text format is invalid.',
      // 'sec3Pr2Text.max' => 'The text must not be greater than 255 characters.',

      // 'sec3Pr2Desc.required' => 'The description is required.',
      // 'sec3Pr2Desc.alpha_string' => 'The description must be a string.',
      // 'sec3Pr2Desc.htmlpurify' => 'The description format is invalid.',
      // 'sec3Pr2Desc.max' => 'The description must not be greater than 1500 characters.',

      // 'sec3Pr2Image.required' => 'The image is required.',

      // 'riaasSec3FeatSet.regex' => 'The format is invalid.',

      'sec4HeadingRed.alpha_string' => 'The heading must be a string.',
      'sec4HeadingRed.content_regex' => 'The heading format is invalid.',
      'sec4HeadingRed.max' => 'The heading must not be greater than 255 characters.',

      'sec4Heading.alpha_string' => 'The heading must be a string.',
      'sec4Heading.content_regex' => 'The heading format is invalid.',
      'sec4Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec4SubHeading.alpha_string' => 'The sub-heading must be a string.',
      'sec4SubHeading.content_regex' => 'The sub-heading format is invalid.',
      'sec4SubHeading.max' => 'The sub-heading must not be greater than 500 characters.',

      'riaasSection4Set.regex' => 'The format is invalid.',

      'sec5Heading.alpha_string' => 'The heading must be a string.',
      'sec5Heading.content_regex' => 'The heading format is invalid.',
      'sec5Heading.max' => 'The heading must not be greater than 255 characters.',

      'sec5SubHeading.alpha_string' => 'The sub-heading must be a string.',
      'sec5SubHeading.content_regex' => 'The sub-heading format is invalid.',
      'sec5SubHeading.max' => 'The sub-heading must not be greater than 500 characters.',

      'riaasSection5Set.regex' => 'The format is invalid.',

      'sec6HeadingRed.alpha_string' => 'The heading must be a string.',
      'sec6HeadingRed.content_regex' => 'The heading format is invalid.',
      'sec6HeadingRed.max' => 'The heading must not be greater than 255 characters.',

      'sec6Heading.alpha_string' => 'The heading must be a string.',
      'sec6Heading.content_regex' => 'The heading format is invalid.',
      'sec6Heading.max' => 'The heading must not be greater than 500 characters.',
    ];

    $section2set = $request->riaasSection2Set ?? '';
    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $messages["riaasSection2HeadR$index.alpha_string"] = 'The heading must be a string.';
        $messages["riaasSection2HeadR$index.content_regex"] = 'The heading format is invalid.';
        $messages["riaasSection2HeadR$index.max"] = 'The heading must not be greater than 255 characters.';
      }
    }

    // $section3FeatSet = $request->riaasSec3FeatSet ?? '';
    // if( $section3FeatSet ){
    //   $sectionIndexes = explode(",", $section3FeatSet);
    //   foreach ($sectionIndexes as $index) {
    //     $messages["riaasSec3FeatHeadR$index.alpha_string"] = 'The heading must be a string.';
    //     $messages["riaasSec3FeatHeadR$index.content_regex"] = 'The heading format is invalid.';
    //     $messages["riaasSec3FeatHeadR$index.max"] = 'The heading must not be greater than 255 characters.';

    //     $messages["riaasSec3FeatTextR$index.alpha_string"] = 'The text must be a string.';
    //     $messages["riaasSec3FeatTextR$index.content_regex"] = 'The text format is invalid.';
    //     $messages["riaasSec3FeatTextR$index.max"] = 'The text must not be greater than 255 characters.';
    //   }
    // }

    $section4set = $request->riaasSection4Set ?? '';
    if( $section4set ){
      $sectionIndexes = explode(",", $section4set);
      foreach ($sectionIndexes as $index) {
        $messages["riaasSection4HeadR$index.alpha_string"] = 'The heading must be a string.';
        $messages["riaasSection4HeadR$index.content_regex"] = 'The heading format is invalid.';
        $messages["riaasSection4HeadR$index.max"] = 'The heading must not be greater than 255 characters.';
      }
    }

    $section5set = $request->riaasSection5Set ?? '';
    if( $section5set ){
      $sectionIndexes = explode(",", $section5set);
      foreach ($sectionIndexes as $index) {
        $messages["riaasSection5HeadR$index.alpha_string"] = 'The heading must be a string.';
        $messages["riaasSection5HeadR$index.content_regex"] = 'The heading format is invalid.';
        $messages["riaasSection5HeadR$index.max"] = 'The heading must not be greater than 255 characters.';
      }
    }

    for($i=1; $i<=3; $i++){
      $messages["riassSection6TitleR{$i}.alpha_string"] = 'The title must be a string.';
      $messages["riassSection6TitleR{$i}.content_regex"] = 'The title format is invalid.';
      $messages["riassSection6TitleR{$i}.max"] = 'The title must not be greater than 255 characters.';

      for($j=1; $j<= ($i==3?1:2); $j++){
        $messages["riassSection6HeadR{$i}C{$j}.alpha_string"] = 'The heading must be a string.';
        $messages["riassSection6HeadR{$i}C{$j}.content_regex"] = 'The heading format is invalid.';
        $messages["riassSection6HeadR{$i}C{$j}.max"] = 'The heading must not be greater than 255 characters.';

        $messages["riassSection6TextR{$i}C{$j}.alpha_string"] = 'The text must be a string.';
        $messages["riassSection6TextR{$i}C{$j}.htmlpurify"] = 'The text format is invalid.';
        $messages["riassSection6TextR{$i}C{$j}.max"] = 'The text must not be greater than 1500 characters.';
      }
    }

    return $messages;
  }
}