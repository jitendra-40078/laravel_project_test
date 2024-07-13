<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Utility\ApiResponse;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{
  public function fetchNews(Request $request){

    $locale = App::getLocale();
    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];

    $page = $request->query('page', 1);
    $type = $request->query('type');

    $query = News::query();

    if( in_array($type, ['press', 'news']) ){
      $query->where('type', $type);
    }

    $query->whereIn('language', $languages);
    $query->where('status', 'A');
    $query->orderBy('publish_date', 'desc');

    $news = $query->paginate(6, ['slug', 'title', 'short_description', 'image', 'type', 'publish_date'], 'page', $page);

    if( $news ){
      return  ApiResponse::send(200, 'success', 'records found', $news);
    }else{
      return ApiResponse::send(200, 'failed', 'no records found', []);
    }
  }
}
