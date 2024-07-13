<?php

namespace App\Http\Controllers\Backend\Api\Pages\UseCase;

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
    $section2set = $pageData['useCaseSection2Set'] ?? '';
    $section2Cards = [];

    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $headText = $pageData["useCaseSection2HeadR$index"] ?? '';
        $image = $pageData["useCaseSection2ImageR$index"] ?? '';

        if( $image || $headText ){
          $record = [
            "head" => $headText,
            "image" => $image
          ];

          array_push($section2Cards, $record);
        }
      }
    }

    return [
      "headingRed" => $pageData['sec2HeadingRed'] ?? '',
      "heading" => $pageData['sec2Heading'] ?? '',
      "subHeading" => $pageData['sec2SubHeading'] ?? '',
      "image" => $pageData['sec2Image'] ?? '',
      "cards" => $section2Cards
    ];
  }

  public static function sectionThree($pageData){
    return [
      "heading" => $pageData['sec3Heading'] ?? '',
      "subHeading" => $pageData['sec3SubHeading'] ?? '',
    ];
  }
}