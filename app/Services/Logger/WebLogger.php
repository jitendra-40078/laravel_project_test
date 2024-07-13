<?php

namespace App\Services\Logger;

use Illuminate\Support\Facades\Log;

class WebLogger
{
  public static function write($type, $message, $data = [])
  {
    // debug, info, notice, warning, error, critical, alert, emergency
    switch($type){
      case 'info' : Log::channel('web')->info($message, $data); break;
      case 'error' : Log::channel('web')->error($message, $data); break;
      case 'debug' : Log::channel('web')->debug($message, $data); break;
    }
  }
}