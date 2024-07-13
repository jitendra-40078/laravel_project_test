<?php

namespace App\Http\Controllers\Backend\Api\Pages\WhatRiaas;

use Illuminate\Support\Str;

class Section
{
  public static function banner($pageData){
    return [
      "heading" => $pageData['heading'] ?? '',
      "image" => $pageData['bannerImage'] ?? '',
    ];
  }

  public static function sectionTwo($pageData){
    $section2set = $pageData['riaasSection2Set'] ?? '';
    $section2Cards = [];

    if( $section2set ){
      $sectionIndexes = explode(",", $section2set);
      foreach ($sectionIndexes as $index) {
        $headText = $pageData["riaasSection2HeadR$index"] ?? '';
        $image = $pageData["riaasSection2ImageR$index"] ?? '';

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
      "heading" => $pageData['sec2Heading'] ?? '',
      "subHeading" => $pageData['sec2SubHeading'] ?? '',
      "cards" => $section2Cards
    ];
  }

  public static function sectionThree($pageData){
    // $product1Card = $product2Card = $featuresCard = [];
    
    // if( $pageData['sec3Pr1Name'] || $pageData['sec3Pr1Text'] || $pageData['sec3Pr1Desc'] || $pageData['sec3Pr1Image'] ){
    //   $product1Card['name'] = $pageData['sec3Pr1Name'] ?? '';
    //   $product1Card['text'] = $pageData['sec3Pr1Text'] ?? '';
    //   $product1Card['description'] = $pageData['sec3Pr1Desc'] ?? '';
    //   $product1Card['image'] = $pageData['sec3Pr1Image'] ?? '';
    // }

    // if( $pageData['sec3Pr2Name'] || $pageData['sec3Pr2Text'] || $pageData['sec3Pr2Desc'] || $pageData['sec3Pr2Image'] ){
    //   $product2Card['name'] = $pageData['sec3Pr2Name'] ?? '';
    //   $product2Card['text'] = $pageData['sec3Pr2Text'] ?? '';
    //   $product2Card['description'] = $pageData['sec3Pr2Desc'] ?? '';
    //   $product2Card['image'] = $pageData['sec3Pr2Image'] ?? '';
    // }

    // $sec3FeatureSet = $pageData['riaasSec3FeatSet'] ?? '';
    // if( $sec3FeatureSet ){
    //   $sectionIndexes = explode(",", $sec3FeatureSet);
    //   foreach ($sectionIndexes as $index) {
    //     $head = $pageData["riaasSec3FeatHeadR$index"] ?? '';
    //     $text = $pageData["riaasSec3FeatTextR$index"] ?? '';
    //     $image = $pageData["riaasSec3FeatImageR$index"] ?? '';

    //     if( $head || $text || $image ){
    //       $record = [
    //         "head" => $head,
    //         "text" => $text,
    //         "image" => $image
    //       ];

    //       array_push($featuresCard, $record);
    //     }
    //   }
    // }

    return [
      "headingRed" => $pageData['sec3HeadingRed'] ?? '',
      "heading" => $pageData['sec3Heading'] ?? '',
      "subHeading" => $pageData['sec3SubHeading'] ?? '',
      "btnText" => $pageData['sec3BtnText'] ?? ''
      // "product1" =>  $product1Card,
      // "product2" =>  $product2Card,
      // "features" => $featuresCard
    ];
  }
  
  public static function sectionFour($pageData){
    $section4set = $pageData['riaasSection4Set'] ?? '';
    $section4Cards = [];

    if( $section4set ){
      $sectionIndexes = explode(",", $section4set);
      foreach ($sectionIndexes as $index) {
        $headText = $pageData["riaasSection4HeadR$index"] ?? '';
        $image = $pageData["riaasSection4ImageR$index"] ?? '';
        $icon = $pageData["riaasSection4IconR$index"] ?? '';

        if( $image || $headText || $icon ){
          $record = [
            "head" => $headText,
            "image" => $image,
            "icon" => $icon
          ];

          array_push($section4Cards, $record);
        }
      }
    }

    return [
      "heading" => $pageData['sec4Heading'] ?? '',
      "headingRed" => $pageData['sec4HeadingRed'] ?? '',
      "subHeading" => $pageData['sec4SubHeading'] ?? '',
      "cards" => $section4Cards
    ];
  }

  public static function sectionFive($pageData){
    $section5set = $pageData['riaasSection5Set'] ?? '';
    $section5Cards = [];

    if( $section5set ){
      $sectionIndexes = explode(",", $section5set);
      foreach ($sectionIndexes as $index) {
        $headText = $pageData["riaasSection5HeadR$index"] ?? '';
        $image = $pageData["riaasSection5ImageR$index"] ?? '';

        if( $image || $headText ){
          $record = [
            "head" => $headText,
            "image" => $image
          ];

          array_push($section5Cards, $record);
        }
      }
    }

    return [
      "heading" => $pageData['sec5Heading'] ?? '',
      "subHeading" => $pageData['sec5SubHeading'] ?? '',
      "cards" => $section5Cards
    ];
  }

  public static function sectionSix($pageData){
    $sectionId = 'riassSection6';
    $section6Cards = [];
    
    for($i=1; $i<=3; $i++){
      $title = $pageData["{$sectionId}TitleR{$i}"] ?? '';
      
      $record['title'] = $title;
      $record['slug'] = Str::slug($title);
      $recordCards = [];

      for($j=1; $j<= ($i==3?1:2); $j++){
        $iconBlue = $pageData["{$sectionId}IconBlueR{$i}C{$j}"] ?? '';
        $iconWhite = $pageData["{$sectionId}IconWhiteR{$i}C{$j}"] ?? '';
        $head = $pageData["{$sectionId}HeadR{$i}C{$j}"] ?? '';
        $text = $pageData["{$sectionId}TextR{$i}C{$j}"] ?? '';

        $temp = [
          'iconBlue' => $iconBlue,
          'iconWhite' => $iconWhite,
          'head' => $head,
          'text' => $text
        ];

        array_push($recordCards, $temp);
      }

      $record['cards'] = $recordCards;
      array_push($section6Cards, $record);
    }

    return [
      "heading" => $pageData['sec6Heading'] ?? '',
      "headingRed" => $pageData['sec6HeadingRed'] ?? '',
      "cards" => $section6Cards
    ];
  }
}