<?php

namespace App\Http\Controllers\Web\Api;

use App\Http\Controllers\Controller;
use App\Utility\ApiResponse;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BlogController extends Controller
{
  public function fetchBlogs(Request $request){

    $locale = App::getLocale();
    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];

    $page = $request->query('page', 1);

    $query = Blog::with('category:id,nameEn,nameKr');

    $query->whereIn('language', $languages);
    $query->where('status', 'A');
    $query->orderBy('publish_date', 'desc');

    $blogs = $query->paginate(5, ['slug', 'title', 'short_description', 'image', 'blog_category_id', 'publish_date'], 'page', $page);

    if( $blogs ){
      return  ApiResponse::send(200, 'success', 'records found', $blogs);
    }else{
      return ApiResponse::send(200, 'failed', 'no records found', []);
    }
  }
}
