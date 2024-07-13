<?php

namespace App\Providers;

use App\Models\Office;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
      //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
   
    Blade::directive('displayShortDescription', function ($expression) {
      return "<?php
      \$words = explode(' ', $expression);
      echo implode(' ', array_slice(\$words, 0, 12)) . (count(\$words) > 12 ? '...' : '');
      ?>";
    });

    View::composer('*', function ($view) {
      $locale = App::getLocale();
      $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];

      $addressData = Office::select('name', 'map', 'phone', 'fax', 'email', 'address')
      ->whereIn('language', $languages)
      ->where('status', 'A')
      ->get();

      $view->with('addressData', $addressData);
      $view->with('locale', $locale);
      $view->with('assetVersion', '?v=1.1.0');
    });
  }
}

// HTMLPurifier - http://htmlpurifier.org/live/configdoc/plain.html