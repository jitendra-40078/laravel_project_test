<?php

namespace App\Services\Logger;

use Illuminate\Support\Facades\Log;

class ErrorLogger
{
  public static function write($type, $message, $data = [])
  {
    // debug, info, notice, warning, error, critical, alert, emergency
    switch($type){
      case 'info' : Log::channel('error')->info($message, $data); break;
      case 'error' : Log::channel('error')->error($message, $data); break;
      case 'debug' : Log::channel('error')->debug($message, $data); break;
    }
  }
}