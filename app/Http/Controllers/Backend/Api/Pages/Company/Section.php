<?php

namespace App\Http\Controllers\Backend\Api\Pages\Company;

class Section
{
  public static function banner($pageData){
    return [
      "heading" => $pageData['heading'] ?? '',
      "subHeading" => $pageData['subHeading'] ?? '',
      "image" => $pageData['bannerImage'] ?? ''
    ];
  }

  public static function sectionTwo($pageData){
    return [
      "visionHeading" => $pageData['visionHeading'] ?? '',
      "visionDescription" => $pageData['visionDescription'] ?? '',
      "visionImage" => $pageData['visionImage'] ?? '',
      "missionHeading" => $pageData['missionHeading'] ?? '',
      "missionDescription" => $pageData['missionDescription'] ?? '',
      "missionImage" => $pageData['missionImage'] ?? '',
    ];
  }

  public static function sectionThree($pageData){
    return [
      "heading" => $pageData['sec3Heading'] ?? '',
      "description" => $pageData['sec3Description'] ?? '',
      "image" => $pageData['sec3Image'] ?? '',
    ];
  }

  public static function sectionFour($pageData){
    return [
      "heading" => $pageData['sec4Heading'] ?? ''
    ];
  }

  public static function sectionFive($pageData){
    return [
      "heading" => $pageData['sec5Heading'] ?? ''
    ];
  }
}