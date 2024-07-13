<?php

namespace App\Http\Controllers\Backend\Api\Pages\Home;

class Section
{
  public static function banner($pageData){
    return [
      "heading1" => $pageData['heading1'] ?? '',
      "heading2" => $pageData['heading2'] ?? '',
      "counterText" => $pageData['counterText'] ?? '',
      "counterUnit" => $pageData['counterUnit'] ?? '',
      "image" => $pageData['bannerImage'] ?? '',
    ];
  }

  public static function sectionTwo($pageData){
    $section2set = $pageData['homeSection2Set'] ?? '';
    $section2Cards = [];

    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $headText = $pageData["homeSection2HeadR$index"] ?? '';
        $descText = $pageData["homeSection2DescR$index"] ?? '';
        $image = $pageData["homeSection2ImageR$index"] ?? '';

        if( $image || $headText || $descText ){
          $record = [
            "head" => $headText,
            "description" => $descText,
            "image" => $image
          ];

          array_push($section2Cards, $record);
        }
      }
    }

    return [
      "headingRed" => $pageData['sec2RedHeading'] ?? '',
      "heading" => $pageData['sec2Heading'] ?? '',
      "subHeading" => $pageData['sec2SubHeading'] ?? '',
      "cards" => $section2Cards
    ];
  }

  public static function sectionThree($pageData){
    $section3set = $pageData['homeSection3Set'] ?? '';
    $section3Cards = [];

    if( $section3set ){
      $sectionIndexes = explode(",", $section3set);
      foreach ($sectionIndexes as $index) {
        $headText = $pageData["homeSection3HeadR$index"] ?? '';
        $descText = $pageData["homeSection3TextR$index"] ?? '';

        if( $headText || $descText ){
          $record = [
            "head" => $headText,
            "text" => $descText
          ];

          array_push($section3Cards, $record);
        }
      }
    }

    return [
      "heading" => $pageData['sec3Heading'] ?? '',
      "headingRed" => $pageData['sec3HeadingRed'] ?? '',
      "subHeading" => $pageData['sec3SubHeading'] ?? '',
      "image" => $pageData['sec3Image'] ?? '',
      "cards" => $section3Cards
    ];
  }

  public static function sectionFour($pageData){
    $section4set = $pageData['homeSection4Set'] ?? '';
    $section4Cards = [];

    if( $section4set ){
      $sectionIndexes = explode(",", $section4set);
      foreach ($sectionIndexes as $index) {
        $headText = $pageData["homeSection4HeadR$index"] ?? '';
        $image = $pageData["homeSection4ImageR$index"] ?? '';
        $cards = [];

        for($i=1; $i<=3; $i++){
          $textLabel = 'homeSection4TextR'.$index.'C'.$i;
          $iconLabel = 'homeSection4IconR'.$index.'C'.$i;

          $text = $pageData[$textLabel] ?? '';
          $icon = $pageData[$iconLabel] ?? '';

          if( $text || $icon ){
            $record = [
              'text' => $text,
              'icon' => $icon
            ];
  
            array_push($cards, $record);
          }
        }
    
        if( $image || $headText || !empty($cards) ){
          $record = [
            "head" => $headText,
            "image" => $image,
            "cards" => $cards
          ];

          array_push($section4Cards, $record);
        }
      }
    }

    return [
      "heading" => $pageData['sec4Heading'] ?? '',
      "subHeading" => $pageData['secSub4Heading'] ?? '',
      "btnText" => $pageData['sec4BtnText'] ?? '',
      "btnLink" => $pageData['sec4BtnLink'] ?? '',
      "cards" => $section4Cards
    ];
  }

  public static function sectionFive($pageData){
    return [
      "heading" => $pageData['sec5Heading'] ?? '',
      "subHeading" => $pageData['sec5SubHeading'] ?? '',
      "btnText" => $pageData['sec5BtnText'] ?? '',
      "btnLink" => $pageData['sec5BtnLink'] ?? ''
    ];
  }

  public static function sectionSix($pageData){
    return [
      "heading" => $pageData['sec6Heading'] ?? '',
      "headingRed" => $pageData['sec6HeadingRed'] ?? '',
      "subHeading" => $pageData['sec6SubHeading'] ?? ''
    ];
  }

  public static function sectionSeven($pageData){
    return [
      "image" => $pageData['sec7Image'] ?? '',
      "boxText" => $pageData['sec7BoxText'] ?? '',
      "btnText" => $pageData['sec7BtnText'] ?? ''
    ];
  }
}