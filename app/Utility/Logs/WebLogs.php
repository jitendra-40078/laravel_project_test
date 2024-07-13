<?php

namespace App\Utility\Logs;

use App\Services\Logger\WebLogger;

class WebLogs
{
  public static function logError(
    $tag,
    $rootPath,
    $e
  ){
    WebLogger::write(
      'error', 
      $tag, 
      [
        'path' => $rootPath,
        'trace' => [
          "code" => $e->getCode(),
          "file" => $e->getFile(),
          "line" => $e->getLine(),
          "message" => $e->getMessage()
        ]
      ]
    );
  }

  public static function logActivity(
    $tag,
    $rootPath,
    $info
  ){
    WebLogger::write(
      'info',
      $tag,
      [
        'path' => $rootPath,
        'trace' => $info
      ]
    );
  }
}