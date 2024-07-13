<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\{Page, Testimonial, CaseStudy, Milestone, Leadership, News, Blog, Job, HazardCount, Country, Product};

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
 
  /**
   *  @page - Home
   *  @url - / 
   *  @author - Amit Kashte
   *  @function - function to load home page view with data
   */
  public function home(){
    $locale = App::getLocale();

    $pageData = Page::select('seo', 'content')
                ->where('template', 'home')
                ->where('lang', $locale)
                ->first();

    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];
    $testimonials = Testimonial::select('title', 'content', 'year', 'image')
                    ->whereIn('language', $languages)
                    ->where('status', 'A')
                    ->orderBy('created_at', 'desc')
                    ->get();

    $news = News::select('title', 'short_description', 'slug', 'image', 'publish_date')
      ->whereIn('language', $languages)
      ->where('status', 'A')
      ->orderBy('publish_date', 'desc')
      ->take(3)
      ->get();

    // Redirect to a 404 page if pageData is not found
    if (!$pageData){
      abort(404);
    }

    $hazardData = HazardCount::select('count', 'formatted_count')
                ->orderBy('created_at', 'desc')
                ->first();

    return view('web.pages.home.page', compact('pageData', 'testimonials', 'news', 'hazardData'));
  }

  /**
   *  @page - What Riaas
   *  @url - /what-riaas
   *  @author - Amit Kashte
   *  @function - function to load what riaas page view with data
   */
  public function whatRiaas(){
    $locale = App::getLocale();

    $pageData = Page::select('seo', 'content')
                ->where('template', 'whatRiaas')
                ->where('lang', $locale)
                ->first();

    $productProperties = CommonActions::getProductProperties();

    $products = Product::select('code', 'name', 'text', 'description', 'image', 'features', 'properties')
                ->where('status', 'A')
                ->get();

    return view('web.pages.what-riaas.page', compact('pageData', 'products', 'productProperties'));
  }

  /**
   *  @page - Use Case
   *  @url - /use-case
   *  @author - Amit Kashte
   *  @function - function to load use case page view with data
   */
  public function useCase(){
    $locale = App::getLocale();

    $pageData = Page::select('seo', 'content')
                ->where('template', 'useCase')
                ->where('lang', $locale)
                ->first();

    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];
    $casestudyData = CaseStudy::select('title', 'content', 'duration', 'image', 'logo', 'report')
                    ->whereIn('language', $languages)
                    ->where('status', 'A')
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('web.pages.use-case.page', compact('pageData', 'casestudyData'));
  }

  /**
   *  @page - Company
   *  @url - /company
   *  @author - Amit Kashte
   *  @function - function to load company page view with data
   */
  public function company(){
    $locale = App::getLocale();

    $pageData = Page::select('seo', 'content')
                ->where('template', 'Company')
                ->where('lang', $locale)
                ->first();

    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];

    $leadershipData = Leadership::select('name', 'designation', 'description', 'image')
                    ->whereIn('language', $languages)
                    ->where('status', 'A')
                    ->get();

    $milestoneData = Milestone::select('year', 'month', 'content')
                    ->whereIn('language', $languages)
                    ->where('status', 'A')
                    ->orderBy('year', 'desc')
                    ->orderBy('month', 'asc')
                    ->get();

    $milestoneYears = $milestoneData->groupBy('year');

    return view('web.pages.company.page', compact('pageData', 'leadershipData', 'milestoneYears'));
  }

  /**
   *  @page - News
   *  @url - /news
   *  @author - Amit Kashte
   *  @function - function to load news listing page view with data
   */
  public function news(){
    $locale = App::getLocale();
    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];

    $pageData = Page::select('seo', 'content')
                ->where('template', 'news')
                ->where('lang', $locale)
                ->first();
                
    $featuredNews = News::select('type', 'slug', 'title', 'short_description', 'image', 'publish_date')
                ->whereIn('language', $languages)
                ->where('status', 'A')
                ->where('is_featured', 'Y')
                ->get();

    return view('web.pages.news.page', compact('pageData', 'featuredNews'));
  }

  /**
   *  @page - News Details
   *  @url - /news/{slug}
   *  @author - Amit Kashte
   *  @function - function to load news details page view with data
   */
  public function newsDetails($slug){

    $locale = App::getLocale();
    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];
                
    $news = News::select('id', 'title', 'short_description', 'content', 'image', 'type', 'publish_date')
                ->whereIn('language', $languages)
                ->where('status', 'A')
                ->where('slug', $slug)
                ->first();

    if( !$news ){
      return redirect()->route('web.newsPage');
    }

    $recommend = News::select('title', 'short_description', 'slug', 'image', 'type')
                ->whereNotIn('id', [$news->id ?? ''])
                ->whereIn('language', $languages)
                ->where('status', 'A')
                ->where('type', $news->type ?? 'news')
                ->orderBy('publish_date', 'desc')
                ->take(5)
                ->get();
                
    // $sqlQuery = $recommend->toSql();
    // $sqlQuery = $recommend->getBindings();

    return view('web.pages.news-details.page', compact('news', 'recommend'));
  }

  /**
   *  @page - Contact
   *  @url - /contact-us
   *  @author - Amit Kashte
   *  @function - function to load contact us page view with data
   */
  public function contact(){

    $locale = App::getLocale();

    $pageData = Page::select('seo', 'content')
                ->where('template', 'ContactUs')
                ->where('lang', $locale)
                ->first();

    $countries = Country::select('nameEn', 'nameKr')
                ->where('status', 'A')
                ->get();

    return view('web.pages.contact.page', compact('pageData', 'countries'));
  }

  /**
   *  @page - Career
   *  @url - /career
   *  @author - Amit Kashte
   *  @function - function to load career page view with data
   */
  public function career(){
    $locale = App::getLocale();
    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];

    $pageData = Page::select('seo', 'content')
                ->where('template', 'career')
                ->where('lang', $locale)
                ->first();

    $jobs = Job::select('id', 'title', 'location', 'description', 'responsibility')
              ->whereIn('language', $languages)
              ->where('status', 'A')
              ->orderBy('created_at', 'desc')
              ->get();

    return view('web.pages.career.page', compact('pageData', 'jobs'));
  }

  /**
   *  @page - Blogs
   *  @url - /blogs
   *  @author - Amit Kashte
   *  @function - function to load blog page view with data
   */
  public function blogs(){
    $locale = App::getLocale();
    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];

    $pageData = Page::select('seo', 'content')
                  ->where('template', 'blog')
                  ->where('lang', $locale)
                  ->first();

    $latestBlog = Blog::with('category:id,nameEn,nameKr')
                ->select('id', 'title', 'slug', 'image', 'publish_date', 'blog_category_id')
                ->whereIn('language', $languages)
                ->where('status', 'A')
                ->orderBy('publish_date', 'desc')
                ->first();

    $similarBlogs = null;
    if( $latestBlog ){
      $similarBlogs = Blog::with('category:id,nameEn,nameKr')
                ->select('id', 'title', 'slug', 'image', 'publish_date', 'blog_category_id')
                ->whereNotIn('id', [$latestBlog->id ?? ''])
                ->whereIn('blog_category_id', [$latestBlog->category->id ?? ''])
                ->whereIn('language', $languages)
                ->where('status', 'A')
                ->orderBy('publish_date', 'desc')
                ->limit(4)
                ->get();
    }

    $trendingBlogs = Blog::select('title', 'slug', 'image', 'publish_date')
                    ->whereNotIn('id', [$latestBlog->id ?? ''])
                    ->whereIn('language', $languages)
                    ->where('status', 'A')
                    ->where('is_trending', 'Y')
                    ->orderBy('publish_date', 'desc')
                    ->limit(4)
                    ->get();

    $popularBlogs = Blog::select('title', 'slug', 'image', 'publish_date')
                    ->whereIn('language', $languages)
                    ->where('status', 'A')
                    ->where('is_popular', 'Y')
                    ->orderBy('publish_date', 'desc')
                    ->limit(4)
                    ->get();

    return view('web.pages.blogs.page', compact('pageData', 'latestBlog', 'similarBlogs', 'trendingBlogs', 'popularBlogs'));
  }

  /**
   *  @page - Blogs
   *  @url - /blog/{slug}
   *  @author - Amit Kashte
   *  @function - function to load blog detail page view with data
   */
  public function blogsDetails($slug){
    $locale = App::getLocale();
    $languages = $locale && $locale === "en" ? ['en', 'both'] : ['kr', 'both'];

    $pageData = Page::select('content')
                ->where('template', 'blog')
                ->where('lang', $locale)
                ->first();

    $blog = Blog::with('category:id,nameEn,nameKr')
            ->select('id', 'title', 'short_description', 'content', 'image', 'publish_date', 'blog_category_id', 'views')
            ->whereIn('language', $languages)
            ->where('status', 'A')
            ->where('slug', $slug)
            ->first();

    if( !$blog ){
      return redirect()->route('web.blogsPage');
    }

    try{
      $blog->views = $blog->views+1;
      $blog->save();
    }
    catch(\Exception $e){}

    $popularBlogs = Blog::select('title', 'slug', 'image')
        ->whereNotIn('id', [$blog->id ?? ''])
        ->whereIn('language', $languages)
        ->where('status', 'A')
        ->orderBy('publish_date', 'desc')
        ->where('is_popular', 'Y')
        ->limit(4)
        ->get();

    return view('web.pages.blog-details.page', compact('blog', 'popularBlogs', 'pageData'));
  }
}