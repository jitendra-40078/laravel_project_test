<?php 

namespace App\Http\Controllers\Backend\Api\Pages;

class Content
{

  public static function get($pageType, $pageContent)
  {
    $sectionClass = self::getSectionClass($pageType);
    $content = [];

    switch($pageType){
      case 'home' : {
        $content['banner'] = $sectionClass::banner($pageContent);
        $content['section2'] = $sectionClass::sectionTwo($pageContent);
        $content['section3'] = $sectionClass::sectionThree($pageContent);
        $content['section4'] = $sectionClass::sectionFour($pageContent);
        $content['section5'] = $sectionClass::sectionFive($pageContent);
        $content['section6'] = $sectionClass::sectionSix($pageContent);
        $content['section7'] = $sectionClass::sectionSeven($pageContent);
      }; break;
      case 'whatRiaas' : {
        $content['banner'] = $sectionClass::banner($pageContent);
        $content['section2'] = $sectionClass::sectionTwo($pageContent);
        $content['section3'] = $sectionClass::sectionThree($pageContent);
        $content['section4'] = $sectionClass::sectionFour($pageContent);
        $content['section5'] = $sectionClass::sectionFive($pageContent);
        $content['section6'] = $sectionClass::sectionSix($pageContent);
      }; break;
      case 'useCase' : {
        $content['banner'] = $sectionClass::banner($pageContent);
        $content['section2'] = $sectionClass::sectionTwo($pageContent);
        $content['section3'] = $sectionClass::sectionThree($pageContent);
      }; break;
      case 'company' : {
        $content['banner'] = $sectionClass::banner($pageContent);
        $content['section2'] = $sectionClass::sectionTwo($pageContent);
        $content['section3'] = $sectionClass::sectionThree($pageContent);
        $content['section4'] = $sectionClass::sectionFour($pageContent);
        $content['section5'] = $sectionClass::sectionFive($pageContent);
      }; break;
      case 'news' : {
        $content['section1'] = $sectionClass::sectionOne($pageContent);
        $content['section3'] = $sectionClass::sectionThree($pageContent);
      }; break;
      case 'contactUs' : {
        $content['section1'] = $sectionClass::sectionOne($pageContent);
        $content['section2'] = $sectionClass::sectionTwo($pageContent);
      }; break;
      case 'career' : {
        $content['section1'] = $sectionClass::sectionOne($pageContent);
        $content['section2'] = $sectionClass::sectionTwo($pageContent);
        $content['section3'] = $sectionClass::sectionThree($pageContent);
      }; break;
      case 'blog' : {
        $content['section1'] = $sectionClass::sectionOne($pageContent);
      }; break;
    }

    return $content;
  }


  private static function getSectionClass($pageType)
  {
    $className = "App\\Http\\Controllers\\Backend\\Api\\Pages\\" . ucfirst($pageType) . "\\Section";
    if (class_exists($className)) {
      return $className;
    }

    throw new \Exception("Section for page type '{$pageType}' does not exist");
  }
}