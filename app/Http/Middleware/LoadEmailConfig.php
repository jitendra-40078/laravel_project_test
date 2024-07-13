<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\MailManager;

class LoadEmailConfig
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    // Fetch settings from database
    $settings = Setting::select('options')
                        ->where('key','mail-smtp')->first();

    if( 
      isset($settings) && $settings &&
      isset($settings->options['host']) && $settings->options['host'] && 
      isset($settings->options['port']) && $settings->options['port'] &&
      isset($settings->options['username']) && $settings->options['username'] && 
      isset($settings->options['password']) && $settings->options['password']
    ){
      
      // Update the mail configuration
      Config::set('mail.mailers.smtp.host',  $settings->options['host']);
      Config::set('mail.mailers.smtp.port',  $settings->options['port']);
      Config::set('mail.mailers.smtp.encryption', 'tls'); // or 'ssl' if needed
      Config::set('mail.mailers.smtp.username', $settings->options['username']);
      Config::set('mail.mailers.smtp.password', $settings->options['password']);

      // Rebind the mailer in the service container
      app()->singleton('mail.manager', function ($app) {
        return new MailManager($app);
      });

      // Refresh the mailer instance
      Mail::setFacadeApplication(app());
    }

    return $next($request);
  }
}
