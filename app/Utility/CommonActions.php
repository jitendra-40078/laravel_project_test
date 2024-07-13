<?php

namespace App\Utility;

use App\Models\{MediaLibrary, MediaLibraryGroup, BlogCategory, ProductProperty};

class CommonActions
{
  public static function getMediaLibraryYears()
  {
    $yeras = MediaLibrary::getDistinctYears(); 
    $records = [];

    if( $yeras && count($yeras) > 0 ){
      foreach( $yeras as $y ){
        array_push($records, [
          "id" => $y->year,
          "name" => $y->year
        ]);
      }
    }

    return $records;
  }

  public static function getMediaLibraryGroups()
  {
    $groups = MediaLibraryGroup::select('id', 'name')
            ->where('status', 'A')
            ->get();

    $records = [];

    if( $groups && count($groups) > 0 ){
      foreach( $groups as $y ){
        array_push($records, [
          "id" => $y->id,
          "name" => $y->name
        ]);
      }
    }

    return $records;
  }

  public static function getBlogCategories()
  {
    $categories = BlogCategory::select('id', 'nameEn')
            ->where('status', 'A')
            ->get();

    $records = [];

    if( $categories && count($categories) > 0 ){
      foreach( $categories as $y ){
        array_push($records, [
          "id" => $y->id,
          "name" => $y->nameEn
        ]);
      }
    }

    return $records;
  }

  public static function getProductProperties()
  {
    $properties = ProductProperty::select('code', 'nameEn', 'nameKr')
            ->where('status', 'A')
            ->get();

    return $properties;
  }

  public static function validateKey($array, $key){
    return isset($array[$key]) && $array[$key] ? $array[$key] : '';
  }
}