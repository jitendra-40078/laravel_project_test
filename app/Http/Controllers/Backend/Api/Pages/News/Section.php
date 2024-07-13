<?php

namespace App\Http\Controllers\Backend\Api\Pages\News;

class Section
{
  public static function sectionOne($pageData){
    return [
      "image" => $pageData['sec1Image'] ?? '',
      "heading" => $pageData['sec1Heading'] ?? '',
      "labelReadMore" => $pageData['labelReadMore'] ?? '',
      "labelAll" => $pageData['labelAll'] ?? '',
      "labelNews" => $pageData['labelNews'] ?? '',
      "labelPress" => $pageData['labelPress'] ?? '',
      "labelLoadMore" => $pageData['labelLoadMore'] ?? ''
    ];
  }

  public static function sectionThree($pageData){
    return [
      "heading" => $pageData['sec3Heading'] ?? '',
      "subHeading" => $pageData['sec3SubHeading'] ?? ''
    ];
  }
}