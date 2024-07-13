<?php

namespace App\Http\Controllers\Backend\Api\Pages\Career;

class Section
{
  public static function sectionOne($pageData){
    return [
      "heading" => $pageData['sec1Heading'] ?? '',
      "subHeading" => $pageData['sec1SubHeading'] ?? '',
      "image" => $pageData['sec1Image'] ?? ''
    ];
  }

  public static function sectionTwo($pageData){
    return [
      "headingRed" => $pageData['sec2HeadingRed'] ?? '',
      "heading" => $pageData['sec2Heading'] ?? '',
      "description" => $pageData['sec2Description'] ?? '',
    ];
  }

  public static function sectionThree($pageData){
    return [
      "heading" => $pageData['sec3Heading'] ?? '',
      "subHeading" => $pageData['sec3SubHeading'] ?? ''
    ];
  }
}