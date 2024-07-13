<?php

namespace App\Http\Controllers\Web\Api\Validators;

class Contact
{
  public static function rules()
  {
    $rules = [
      'company' => 'bail|required|alpha_string|content_regex|max:100',
      'name' => 'bail|required|alpha_string|max:100',
      'email' => 'bail|required|email|max:255|email_check',
      'country' => 'bail|required|max:50',
      'subject' => 'bail|required|alpha_string|content_regex|max:255',
      'message' => 'bail|nullable|alpha_string|content_regex|max:1000'
    ];

    return $rules;
  }

  public static function messages($language)
  {
    if( $language === "en" ){
      $messages = [
        'company.required' => 'The company is required.',
        'company.alpha_string' => 'The company must be string.',
        'company.content_regex' => 'The company format is incorrect.',
        'company.max' => 'The company must not be greater than 100 characters.',
    
        'name.required' => 'The name is required.',
        'name.alpha_string' => 'The name must be string.',
        'name.content_regex' => 'The name format is incorrect.',
        'name.max' => 'The name must not be greater than 100 characters.',
    
        'email.required' => 'The email is required.',
        'email.email' => 'The email is incorrect.',
        'email.email_check' => 'The email is incorrect.',
        'email.max' => 'The email must not be greater than 255 characters.',
    
        'country.required' => 'The country is required.',
        'country.max' => 'The country must not be greater than 50 characters.',
    
        'subject.required' => 'The subject is required.',
        'subject.alpha_string' => 'The subject must be string.',
        'subject.content_regex' => 'The subject format is incorrect.',
        'subject.max' => 'The subject must not be greater than 255 characters.',
    
        'message.alpha_string' => 'The message must be string.',
        'message.content_regex' => 'The message format is incorrect.',
        'message.max' => 'The message must not be greater than 1000 characters.',
      ];
    }else{
      $messages = [
        'company.required' => '회사/단체명을 입력해주세요.',
        'company.alpha_string' => '회사/단체명은 문자열이어야 합니다.',
        'company.content_regex' => '회사/단체명의 형식이 정확하지 않습니다.',
        'company.max' => '회사/단체명은 100자를 넘을 수 없습니다.',
    
        'name.required' => '이름을 입력해주세요.',
        'name.alpha_string' => '이름은 문자열이어야 합니다.',
        'name.content_regex' => '이름의 형식이 정확하지 않습니다.',
        'name.max' => '이름은 100자를 넘을 수 없습니다.',
    
        'email.required' => '이메일을 입력해주세요.',
        'email.email' => '이메일 형식이 정확하지 않습니다.',
        'email.email_check' => '이메일 형식이 정확하지 않습니다.',
        'email.max' => '이메일 주소는 255자를 넘을 수 없습니다.',
    
        'country.required' => '국가를 입력해주세요.',
        'country.max' => '국가는 50자를 넘을 수 없습니다.',
    
        'subject.required' => '제목을 입력해주세요.',
        'subject.alpha_string' => '제목은 문자열이어야 합니다.',
        'subject.content_regex' => '제목의 형식이 정확하지 않습니다.',
        'subject.max' => '제목은 255자를 넘을 수 없습니다.',
    
        'message.alpha_string' => '내용은 문자열이어야 합니다.',
        'message.content_regex' => '내용의 형식이 정확하지 않습니다.',
        'message.max' => '내용은 1000자를 넘을 수 없습니다.',
      ];
    }

    return $messages;
  }
}