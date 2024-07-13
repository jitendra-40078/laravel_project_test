<?php

namespace App\Http\Controllers\Backend\Api\Pages\Blog;

class Section
{
  public static function sectionOne($pageData){
    return [
      "trending" => $pageData['headTrending'] ?? '',
      "latest" => $pageData['headLatest'] ?? '',
      "popular" => $pageData['headPopular'] ?? '',
      "btnText" => $pageData['btnText'] ?? '',
      "shareText" => $pageData['shareText'] ?? ''
    ];
  }
} 