<?php 

namespace App\Http\Controllers\Backend\Api\Pages;

class Seo
{

  public static function get($pageData)
  {
    return [
      'metaTitle' => $pageData['metaTitle'] ?? '',
      'metaDescription' => $pageData['metaDescription'] ?? ''
    ];
  }
}