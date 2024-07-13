<?php

namespace App\Http\Controllers\Backend\Api\Validators;

class Page
{
  public static function rules($pageType, $lang, $request)
  {
    $validatorClass = self::getValidatorClass($pageType);
    return $validatorClass::rules($request, $lang);
  }

  public static function messages($pageType, $request)
  {
    $validatorClass = self::getValidatorClass($pageType);
    return $validatorClass::messages($request);
  }

  private static function getValidatorClass($pageType)
  {
    $className = "App\\Http\\Controllers\\Backend\\Api\\Pages\\" . ucfirst($pageType) . "\\Validator";
    if (class_exists($className)) {
      return $className;
    }

    throw new \Exception("Validator for page type '".ucfirst($pageType)."' does not exist");
  }
}