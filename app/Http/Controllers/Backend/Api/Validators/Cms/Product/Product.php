<?php

namespace App\Http\Controllers\Backend\Api\Validators\Cms\Product;

class Product
{
  public static function rules($request, $language, $type, $recordId, $properties)
  {
    $rules = [
      'language' => 'bail|required|in:en,kr,both',
      'status' => 'bail|required|in:A,D',
      'featuresEnSet' => 'nullable|bail|regex:/^[0-9,]+$/',
      'featuresKrSet' => 'nullable|bail|regex:/^[0-9,]+$/',
    ];

    if( in_array($language, ['en', 'both'])){
      $rules['imageEn'] = 'bail|required';
      $rules['nameEn'] = 'bail|required|alpha_string_en|content_regex_en|max:255';
      $rules['subTextEn'] = 'bail|nullable|alpha_string_en|content_regex_en|max:255';
      $rules['descriptionEn'] = 'bail|required|alpha_string_en|htmlpurify|max:1500';

      if( isset($properties) && count($properties) > 0 ){
        foreach( $properties as $p ){
          $rules["{$p->code}En"] = 'bail|nullable|content_regex_en|max:500';
        }
      }

      $featuresEnSet = $request->featuresEnSet ?? '';
      if( $featuresEnSet ){
        $sectionIndexes = explode(",", $featuresEnSet);
        foreach ($sectionIndexes as $index) {
          $rules["featuresEnHeadR$index"] = 'nullable|bail|alpha_string_en|content_regex_en|max:255';
          $rules["featuresEnTextR$index"] = 'nullable|bail|alpha_string_en|content_regex_en|max:255';
          $rules["featuresEnImageR$index"] = 'nullable';
        }
      }
    }

    if( in_array($language, ['kr', 'both'])){
      $rules['imageKr'] = 'bail|required';
      $rules['nameKr'] = 'bail|required|alpha_string_kr|content_regex_kr|max:255';
      $rules['subTextKr'] = 'bail|nullable|alpha_string_kr|content_regex_kr|max:255';
      $rules['descriptionKr'] = 'bail|required|alpha_string_kr|htmlpurify|max:1500';

      if( isset($properties) && count($properties) > 0 ){
        foreach( $properties as $p ){
          $rules["{$p->code}Kr"] = 'bail|nullable|content_regex_kr|max:500';
        }
      }

      $featuresKrSet = $request->featuresKrSet ?? '';
      if( $featuresKrSet ){
        $sectionIndexes = explode(",", $featuresKrSet);
        foreach ($sectionIndexes as $index) {
          $rules["featuresKrHeadR$index"] = 'nullable|bail|alpha_string_kr|content_regex_kr|max:255';
          $rules["featuresKrTextR$index"] = 'nullable|bail|alpha_string_kr|content_regex_kr|max:255';
          $rules["featuresKrImageR$index"] = 'nullable';
        }
      }
    }

    return $rules;
  }

  public static function messages($request, $properties)
  {
    $messages = [
      'language.required' => 'The language is required.',
      'language.in' => 'The language is invalid.',

      'status.required' => 'The status is required.',
      'status.in' => 'The status is invalid.',

      'imageEn.required' => 'The image is required.',

      'nameEn.required' => 'The name is required.',
      'nameEn.alpha_string_en' => 'The name must be string.',
      'nameEn.content_regex_en' => 'The name contains invalid characters.',
      'nameEn.max' => 'The name must not be greater than 255 characters.',

      'subTextEn.required' => 'The text is required.',
      'subTextEn.alpha_string_en' => 'The text must be string.',
      'subTextEn.content_regex_en' => 'The text contains invalid characters.',
      'subTextEn.max' => 'The text must not be greater than 255 characters.',

      'descriptionEn.required' => 'The description is required.',
      'descriptionEn.alpha_string_en' => 'The description must be string.',
      'descriptionEn.htmlpurify' => 'The description contains invalid characters.',
      'descriptionEn.max' => 'The description must not be greater than 1500 characters.',

      'imageKr.required' => 'The image is required.',

      'nameKr.required' => 'The name is required.',
      'nameKr.alpha_string_kr' => 'The name must be string.',
      'nameKr.content_regex_kr' => 'The name contains invalid characters.',
      'nameKr.max' => 'The name must not be greater than 255 characters.',

      'subTextKr.required' => 'The text is required.',
      'subTextKr.alpha_string_kr' => 'The text must be string.',
      'subTextKr.content_regex_kr' => 'The text contains invalid characters.',
      'subTextKr.max' => 'The text must not be greater than 255 characters.',

      'descriptionKr.required' => 'The description is required.',
      'descriptionKr.alpha_string_kr' => 'The description must be string.',
      'descriptionKr.htmlpurify' => 'The description contains invalid characters.',
      'descriptionKr.max' => 'The description must not be greater than 1500 characters.',

      'featuresEnSet.regex' => 'The value is incorrect.',
      'featuresKrSet.regex' => 'The value is incorrect.',
    ];

    if( isset($properties) && count($properties) > 0 ){
      foreach( $properties as $p ){
        $messages["{$p->code}En.content_regex_en"] = 'The text contains invalid characters.';
        $messages["{$p->code}En.max"] = 'The text must not be greater than 500 characters.';
      }
    }

    if( isset($properties) && count($properties) > 0 ){
      foreach( $properties as $p ){
        $messages["{$p->code}Kr.content_regex_kr"] = 'The text contains invalid characters.';
        $messages["{$p->code}Kr.max"] = 'The text must not be greater than 500 characters.';
      }
    }

    $featuresEnSet = $request->featuresEnSet ?? '';
    if( $featuresEnSet ){
      $sectionIndexes = explode(",", $featuresEnSet);
      foreach ($sectionIndexes as $index) {
        $messages["featuresEnHeadR$index.alpha_string_en"] = 'The heading must be a string.';
        $messages["featuresEnHeadR$index.content_regex_en"] = 'The heading contains invalid characters.';
        $messages["featuresEnHeadR$index.max"] = 'The heading must not be greater than 255 characters.';

        $messages["featuresEnTextR$index.alpha_string_en"] = 'The text must be a string.';
        $messages["featuresEnTextR$index.content_regex_en"] = 'The text contains invalid characters.';
        $messages["featuresEnTextR$index.max"] = 'The text must not be greater than 255 characters.';
      }
    }

    $featuresKrSet = $request->featuresKrSet ?? '';
    if( $featuresKrSet ){
      $sectionIndexes = explode(",", $featuresKrSet);
      foreach ($sectionIndexes as $index) {
        $messages["featuresKrHeadR$index.alpha_string_kr"] = 'The heading must be a string.';
        $messages["featuresKrHeadR$index.content_regex_kr"] = 'The heading contains invalid characters.';
        $messages["featuresKrHeadR$index.max"] = 'The heading must not be greater than 255 characters.';

        $messages["featuresKrTextR$index.alpha_string_kr"] = 'The text must be a string.';
        $messages["featuresKrTextR$index.content_regex_kr"] = 'The text contains invalid characters.';
        $messages["featuresKrTextR$index.max"] = 'The text must not be greater than 255 characters.';
      }
    }

    return $messages;
  }
}