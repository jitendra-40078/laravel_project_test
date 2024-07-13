<?php

namespace App\Http\Controllers\Web\Api\Validators;

class Job
{
  public static function rules()
  {
    $rules = [
      'jobId' => 'nullable',
      'jobTitle' => 'nullable',
      'jobFirstName' => 'bail|required|alpha_string|max:50',
      'jobLastName' => 'bail|required|alpha_string|max:50',
      'jobEmail' => 'bail|required|email_check|max:255',
      'jobMobile' => 'bail|required|is_valid_mobile|max:20',
      'jobResume' => 'bail|required|file|mimes:pdf,doc,docx|max:5120',
      'coverLetter' => 'bail|nullable|file|mimes:pdf,doc,docx|max:5120',
      'otherDoc' => 'bail|nullable|file|mimes:pdf,doc,docx|max:5120',
    ];

    return $rules;
  }

  public static function messages($language)
  {
    if( $language === "en" ){
      $messages = [
        'jobFirstName.required' => 'The first name is required.',
        'jobFirstName.alpha_string' => 'The first name must be string.',
        'jobFirstName.max' => 'The first name must not be greater than 50 characters.',

        'jobLastName.required' => 'The last name is required.',
        'jobLastName.alpha_string' => 'The last name must be string.',
        'jobLastName.max' => 'The last name must not be greater than 50 characters.',

        'jobEmail.required' => 'The email id is required.',
        'jobEmail.email_check' => 'The email id is incorrect.',
        'jobEmail.max' => 'The email id must not be greater than 255 characters.',

        'jobMobile.required' => 'The mobile number is required.',
        'jobMobile.is_valid_mobile' => "The mobile number is incorrect.",
        'jobMobile.max' => 'The mobile number must not be greater than 20 characters.',

        'jobResume.required' => 'A resume is required.',
        'jobResume.file' => 'The attached file format is not supported.',
        'jobResume.mimes' => 'The attached file format is not supported. Please upload the file in one of the following formats: PDF, DOC, or DOCX.',
        'jobResume.max' => 'You have exceeds the maximum upload limit of 5mb.',

        'coverLetter.file' => 'The attached file format is not supported.',
        'coverLetter.mimes' => 'The attached file format is not supported. Please upload the file in one of the following formats: PDF, DOC, or DOCX.',
        'coverLetter.max' => 'You have exceeds the maximum upload limit of 5mb.',

        'otherDoc.file' => 'The attached file format is not supported.',
        'otherDoc.mimes' => 'The attached file format is not supported. Please upload the file in one of the following formats: PDF, DOC, or DOCX.',
        'otherDoc.max' => 'You have exceeds the maximum upload limit of 5mb.',
      ];
    }else{
      $messages = [
        'jobFirstName.required' => '성을 입력해주세요.',
        'jobFirstName.alpha_string' => '성은 문자열이어야 합니다.',
        'jobFirstName.max' => '성은 50자를 넘을 수 없습니다.',

        'jobLastName.required' => '이름을 입력해주세요.',
        'jobLastName.alpha_string' => '이름은 문자열이어야 합니다.',
        'jobLastName.max' => '이름은 50자를 넘을 수 없습니다.',

        'jobEmail.required' => '이메일을 입력해주세요.',
        'jobEmail.email' => '이메일 형식이 정확하지 않습니다.',
        'jobEmail.email_check' => '이메일 형식이 정확하지 않습니다.',
        'jobEmail.max' => '이메일 주소는 255자를 넘을 수 없습니다.',

        'jobMobile.required' => '핸드폰 번호를 입력해주세요.',
        'jobMobile.is_valid_mobile' => "핸드폰 번호가 정확하지 않습니다.",
        'jobMobile.max' => '핸드폰 번호는 20자를 넘을 수 없습니다.',

        'jobResume.required' => '이력서는 필수입니다.',
        'jobResume.file' => '첨부하신 파일을 지원하지 않습니다.',
        'jobResume.mimes' => '첨부하신 파일 형식을 지원하지 않습니다. pdf, doc, docx 형식으로 업로드해 주세요.',
        'jobResume.max' => '첨부파일은 5MB까지 업로드 가능합니다.',

        'coverLetter.file' => '첨부하신 파일을 지원하지 않습니다.',
        'coverLetter.mimes' => '첨부하신 파일 형식을 지원하지 않습니다. pdf, doc, docx 형식으로 업로드해 주세요.',
        'coverLetter.max' => '첨부파일은 5MB까지 업로드 가능합니다.',

        'otherDoc.file' => '첨부하신 파일을 지원하지 않습니다.',
        'otherDoc.mimes' => '첨부하신 파일 형식을 지원하지 않습니다. pdf, doc, docx 형식으로 업로드해 주세요.',
        'otherDoc.max' => '첨부파일은 5MB까지 업로드 가능합니다.',
      ];
    }
    
    return $messages;
  }
}