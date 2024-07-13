<?php

namespace App\Http\Controllers\Backend\Api\Pages\ContactUs;

class Section
{
  public static function sectionOne($pageData){
    return [
      "headingRed" => $pageData['sec1HeadingRed'] ?? '',
      "heading" => $pageData['sec1Heading'] ?? '',
      "subHeading" => $pageData['sec1SubHeading'] ?? ''
    ];
  }

  public static function sectionTwo($pageData){
    return [
      "headingRed" => $pageData['sec2HeadingRed'] ?? '',
      "heading" => $pageData['sec2Heading'] ?? '',
    ];
  }
}