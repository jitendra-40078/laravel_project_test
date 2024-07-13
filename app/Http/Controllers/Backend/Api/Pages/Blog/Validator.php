<?php

namespace App\Http\Controllers\Backend\Api\Pages\Blog;

class Validator
{
  public static function rules($request, $lang)
  {
    $rules = [
      'metaTitle' => 'bail|required|alpha_string|content_regex|max:255',
      'metaDescription' => 'bail|required|alpha_string|content_regex|max:500'
    ];

    if( $lang === "en" ){
      $rules['headTrending'] = 'bail|required|alpha_string_en|content_regex_en|max:100';
      $rules['headLatest'] = 'bail|required|alpha_string_en|content_regex_en|max:100';
      $rules['headPopular'] = 'bail|required|alpha_string_en|content_regex_en|max:100';
      $rules['btnText'] = 'bail|required|alpha_string_en|content_regex_en|max:50';
      $rules['shareText'] = 'bail|required|alpha_string_en|content_regex_en|max:50';
    }else{
      $rules['headTrending'] = 'bail|required|alpha_string_kr|content_regex_kr|max:100';
      $rules['headLatest'] = 'bail|required|alpha_string_kr|content_regex_kr|max:100';
      $rules['headPopular'] = 'bail|required|alpha_string_kr|content_regex_kr|max:100';
      $rules['btnText'] = 'bail|required|alpha_string_kr|content_regex_kr|max:50';
      $rules['shareText'] = 'bail|required|alpha_string_kr|content_regex_kr|max:50';
    }

    return $rules;
  }

  public static function messages($request)
  {
    $messages = [
      'metaTitle.required' => 'The meta title is required.',
      'metaTitle.alpha_string' => 'The meta title must be string.',
      'metaTitle.content_regex' => 'The meta title contains invalid characters.',
      'metaTitle.max' => 'The meta title must not be greater than 255 characters.',

      'metaDescription.required' => 'The meta description is required.',
      'metaDescription.alpha_string' => 'The meta description must be a string.',
      'metaDescription.content_regex' => 'The meta description contains invalid characters.',
      'metaDescription.max' => 'The meta description must not be greater than 500 characters.',

      'headTrending.required' => 'The text is required.',
      'headTrending.max' => 'The text must not be greater than 100 characters.',
      'headTrending.alpha_string_en' => 'The text must be a string.',
      'headTrending.alpha_string_kr' => 'The text must be a string.',
      'headTrending.content_regex_en' => 'The text contains invalid characters.',
      'headTrending.content_regex_kr' => 'The text contains invalid characters.',

      'headLatest.required' => 'The text is required.',
      'headLatest.max' => 'The text must not be greater than 100 characters.',
      'headLatest.alpha_string_en' => 'The text must be a string.',
      'headLatest.alpha_string_kr' => 'The text must be a string.',
      'headLatest.content_regex_en' => 'The text contains invalid characters.',
      'headLatest.content_regex_kr' => 'The text contains invalid characters.',

      'headPopular.required' => 'The text is required.',
      'headPopular.max' => 'The text must not be greater than 100 characters.',
      'headPopular.alpha_string_en' => 'The text must be a string.',
      'headPopular.alpha_string_kr' => 'The text must be a string.',
      'headPopular.content_regex_en' => 'The text contains invalid characters.',
      'headPopular.content_regex_kr' => 'The text contains invalid characters.',

      'btnText.required' => 'The text is required.',
      'btnText.max' => 'The text must not be greater than 50 characters.',
      'btnText.alpha_string_en' => 'The text must be a string.',
      'btnText.alpha_string_kr' => 'The text must be a string.',
      'btnText.content_regex_en' => 'The text contains invalid characters.',
      'btnText.content_regex_kr' => 'The text contains invalid characters.',

      'shareText.required' => 'The text is required.',
      'shareText.max' => 'The text must not be greater than 50 characters.',
      'shareText.alpha_string_en' => 'The text must be a string.',
      'shareText.alpha_string_kr' => 'The text must be a string.',
      'shareText.content_regex_en' => 'The text contains invalid characters.',
      'shareText.content_regex_kr' => 'The text contains invalid characters.',
    ];

    return $messages;
  }
}