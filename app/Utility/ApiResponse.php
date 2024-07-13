<?php

namespace App\Utility;

class ApiResponse
{

  public static $commonMessages = [
    'success' => 'SUCCESS',
    'failed' => 'FAILED',
    'alert' => 'ALERT',
    'alertBox' => 'ALERT_BOX',
    'alertSuccessReload' => 'SUCCESS_ALERT_RELOAD',
    'alertSuccessRedirect' => 'SUCCESS_ALERT_REDIRECT',
    'accountSuspended' => 'Your account has been suspended. Contact administrator.',
    'credentialsNotMatched' => 'Username and Password does not match.',
    'maxAttempts' => 'There have been several failed attempts to sign in from this account. Please wait a while and try again later.',
    'somethingWrong' => "We've encountered an unexpected issue. Please try again shortly.",
    'failureMsg' => "We've encountered an unexpected issue. Please try again shortly.",
    'recordAdded' => 'Record added successfully.',
    'recordUpdated' => 'Record has been updated successfully.',
    'recordDeleted' => 'Record deleted successfully.',
    'contactThankYouEn' => 'Your enquiry has been successfully submitted. We appreciate you contacting us and will respond to your query as soon as possible.',
    'contactThankYouKr' => '문의가 성공적으로 등록되었습니다. 확인 후 최대한 빠르게 답변드리겠습니다.',
    "careerThankYouEn" => "Your application has been successfully submitted.",
    "careerThankYouKr" => "지원이 성공적으로 완료되었습니다.",
    'newsletterThankYouEn' => "Thank you for subscribing to our newsletter.",
    'newsletterThankYouKr' => "다리소프트 뉴스레터를 구독해주셔서 감사합니다.",
    // 'failureMsgEn' => "We've encountered an unexpected issue. Please try again shortly.",
    // 'failureMsgKr' => '예상치 못한 문제가 발생했습니다. 잠시 후 다시 시도해 주세요.',
    'failureMsgEn' => "Oops! Something went wrong. Please try again.",
    'failureMsgKr' => '오류가 발생했습니다. 다시 시도해주세요.',
  ];

  public static $webRoutes = [
    'dashboard' => '/cms/dashboard',
    'mediaLibraryGroupList' => '/cms/media-library/group',
    'testimonialList' => '/cms/testimonial',
    'casestudyList' => '/cms/case-study',
    'milestoneList' => '/cms/milestone',
    'leadershipList' => '/cms/leadership',
    'officeList' => '/cms/office',
    'newsList' => '/cms/news',
    'blogCategoryList' => '/cms/blog/category',
    'blogList' => '/cms/blog',
    'jobList' => '/cms/job',
    'mailSettings' => '/cms/settings/email',
    'productPropertyList' => '/cms/product/property',
    'productList' => '/cms/product',
    'rolePermissionList' => '/cms/master/permission'
  ];

  public static function send($httpStatusCode, $type, $message, $records){
    return response()->json([
      'status' => isset($type) && $type ? self::$commonMessages[$type] : '',
      'message' => $message ?? '',
      'records' => $records ?? ''
    ], $httpStatusCode ?? 200);
  }

  public static function validateError($errors){
    return response()->json([
      'status' => 'VALIDATION_ERRORS',
      'errors' => $errors ?? ''
    ], 422);
  }

  public static function alertBox($httpStatusCode, $type, $icon, $messageKey){
    return response()->json([
      'status' => isset($type) && $type ? self::$commonMessages[$type] : '',
      'type' => $icon ?? '',
      'text' => isset($messageKey) && $messageKey ? self::$commonMessages[$messageKey] : '',
    ], $httpStatusCode ?? '');
  }

  public static function redirect($httpStatusCode, $redirectKey){
    return response()->json([
      'status' => 'REDIRECT',
      'redirect' => isset($redirectKey) && $redirectKey ? self::$webRoutes[$redirectKey] : ''
    ], $httpStatusCode ?? '');
  }

  public static function alert($httpStatusCode, $type, $title, $icon, $messageKey, $redirectKey)
  {
    return response()->json([
      'status' => isset($type) && $type ? self::$commonMessages[$type] : '',
      'alertTitle' => $title ?? '',
      'alertIcon' => $icon ?? '',
      'alertText' => isset($messageKey) && $messageKey ? self::$commonMessages[$messageKey] : '',
      'redirect' => isset($redirectKey) && $redirectKey ? self::$webRoutes[$redirectKey] : ''
    ], $httpStatusCode ?? '');
  }
}