<?php

namespace App\Http\Controllers\Web\Api\Validators;

class Newsletter
{
  public static function rules()
  {
    $rules = [
      'subscribeEmail' => 'bail|required|email_check|unique:newsletter_enquiries,email|max:255',
    ];

    return $rules;
  }

  public static function messages($language)
  {
    if( $language === "en" ){
      $messages = [
        'subscribeEmail.required' => 'The email id is required.',
        'subscribeEmail.email_check' => 'The email id is incorrect.',
        'subscribeEmail.unique' => 'The email id is already subscribed with us.',
        'subscribeEmail.max' => 'The email id must not be greater than 255 characters.'
      ];
    }else{
      $messages = [
        'subscribeEmail.required' => '이메일을 입력해주세요.',
        'subscribeEmail.email_check' => '이메일 형식이 정확하지 않습니다.',
        'subscribeEmail.unique' => '이미 구독을 신청하신 이메일입니다.',
        'subscribeEmail.max' => '이메일 주소는 255자를 넘을 수 없습니다.'
      ];
    }

    return $messages;
  }
}