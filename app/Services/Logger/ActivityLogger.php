<?php

namespace App\Services\Logger;

use Illuminate\Support\Facades\Log;

class ActivityLogger
{
  public static function write($type, $message, $data = [])
  {
    // debug, info, notice, warning, error, critical, alert, emergency
    switch($type){
      case 'info' : Log::channel('activity')->info($message, $data); break;
      case 'error' : Log::channel('activity')->error($message, $data); break;
      case 'debug' : Log::channel('activity')->debug($message, $data); break;
    }
  }
}