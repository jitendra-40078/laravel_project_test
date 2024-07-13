<?php

namespace App\Utility\Logs;

use App\Services\Logger\ActivityLogger;
use App\Services\Logger\ErrorLogger;

class AdminLogs
{
  public static function logError(
    $tag,
    $rootPath,
    $e
  ){
    ErrorLogger::write(
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
    ActivityLogger::write(
      'info',
      $tag,
      [
        'path' => $rootPath,
        'trace' => $info
      ]
    );
  }
}