<?php

namespace App\Providers;

use App\Utility\Logs\AdminLogs;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Validator;
use HTMLPurifier;
use HTMLPurifier_Config;

class CustomValidationServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
      //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    Validator::extend('email_check', function ($attribute, $value, $parameters, $validator) {
      return filter_var($value, FILTER_VALIDATE_EMAIL);
    });

    Validator::extend('phone_regex', function ($attribute, $value, $parameters, $validator) {
      return preg_match('/^[0-9.+~\\-\\s]+$/u', $value);
    });

    Validator::extend('is_valid_mobile', function ($attribute, $value, $parameters, $validator) {
      return preg_match('/^(?:\d{1,4}\s?)?(?:[\s.-]?\d{2,4}){2,5}$/', $value);
    });

    Validator::extend('credential_check', function ($attribute, $value, $parameters, $validator) {
      return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d@$!]{8,}$/', $value);
    });

    Validator::extend('htmlpurify', function ($attribute, $value, $parameters, $validator) {
      $inputValue = html_entity_decode($value);
	  $config = HTMLPurifier_Config::createDefault();

      $config->set('Core.Encoding', 'UTF-8');
      $config->set('Core.EscapeNonASCIICharacters', true);
      $config->set('HTML.Allowed', 'p,a[href|title],br,em,strong,div[align],span[style],pre,ul,li,h1,h2,h3,h4,h5,h6');
    
      $purifier = new HTMLPurifier($config);
      $cleanHtml = $purifier->purify($inputValue);

      // return $cleanHtml === $value;

      // Normalize newlines
      $normalizedValue = $this->normalizeNewlines($inputValue);
      $normalizedCleanHtml = $this->normalizeNewlines($cleanHtml);

      // AdminLogs::logActivity(
      //   'HTML PURIFY',
      //   '',
      //   [
		  // "output" => $normalizedCleanHtml === $normalizedValue,
      //     "value" => $normalizedValue,
      //     "cleanHtml" => html_entity_decode($normalizedCleanHtml)			
      //   ]
      // );
		
      return html_entity_decode($normalizedCleanHtml) === $normalizedValue;
    });

    Validator::extend('alpha_string', function ($attribute, $value, $parameters, $validator) {
      // return preg_match('/[A-Za-z]/', $value); // Check if there is at least one letter
      // return preg_match('/[A-Za-z\u3131-\u314E\u314F-\u3163\uAC00-\uD7A3]/', $value); // not supported
      return preg_match('/[A-Za-z\x{3131}-\x{314E}\x{314F}-\x{3163}\x{AC00}-\x{D7A3}]/u', $value);
    });

    Validator::extend('content_regex', function ($attribute, $value, $parameters, $validator) {
      return preg_match('/^[A-Za-z0-9,.:;+&_?()#@$%!*{}~\|\’\"\'\\-\\s\/\x{3131}-\x{314E}\x{314F}-\x{3163}\x{AC00}-\x{D7A3}]+$/u', $value);
    });

    Validator::extend('alpha_string_en', function ($attribute, $value, $parameters, $validator) {
      return preg_match('/[A-Za-z]/u', $value);
    });

    Validator::extend('content_regex_en', function ($attribute, $value, $parameters, $validator) {
      return preg_match('/^[A-Za-z0-9,.:;+&_±?()#@$%!*{}~\|\’\"\'\\-\\s\/]+$/u', $value);
    });

    Validator::extend('alpha_string_kr', function ($attribute, $value, $parameters, $validator) {
      return preg_match('/[A-Za-z\x{3131}-\x{314E}\x{314F}-\x{3163}\x{AC00}-\x{D7A3}]/u', $value);
    });

    Validator::extend('content_regex_kr', function ($attribute, $value, $parameters, $validator) {
      return preg_match('/^[A-Za-z0-9,.:;+&_±?()#@$%!*{}~\|\’\"\'\\-\\s\/\x{3131}-\x{314E}\x{314F}-\x{3163}\x{AC00}-\x{D7A3}]+$/u', $value);
    });
  }

  public function normalizeNewlines($string) {
    // Replace \r\n and \r with \n
    return str_replace(["\r\n", "\r"], "\n", $string);
  }
}
