<?php

use App\Http\Controllers\Web\{LanguageController, PageController};
use App\Http\Controllers\Web\Api\{FormController, NewsController, BlogController};

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('language/{language}', [LanguageController::class, 'switchLang'])->name('language.switch');

/**
 * Frontend routes
 */
Route::get('/', [PageController::class, 'home'])->name('web.homePage');
Route::get('/what-riaas', [PageController::class, 'whatRiaas'])->name('web.whatriaasPage');
Route::get('/use-case', [PageController::class, 'useCase'])->name('web.useCasePage');
Route::get('/company', [PageController::class, 'company'])->name('web.companyPage');
Route::get('/news', [PageController::class, 'news'])->name('web.newsPage');
Route::get('/news/{slug}', [PageController::class, 'newsDetails'])->name('web.newsDetails');
Route::get('/contact-us', [PageController::class, 'contact'])->name('web.contactPage');
Route::get('/career', [PageController::class, 'career'])->name('web.careerPage');
Route::get('/blogs', [PageController::class, 'blogs'])->name('web.blogsPage');
Route::get('/blog/{slug}', [PageController::class, 'blogsDetails'])->name('web.blogsDetailsPage');
Route::get('/emailer', [PageController::class, 'emailer'])->name('web.emailerPage');

/**
 * APIs routes
 */
Route::prefix('/api/web')->group(function(){
  Route::post('/contact/store', [FormController::class, 'contactEnquiry'])->name('web.api.contact')->middleware('loadMailConfig');
  Route::post('/newsletter/store', [FormController::class, 'NewsletterEnquiry'])->name('web.api.newsletter');
  Route::post('/career/store', [FormController::class, 'careerEnquiry'])->name('web.api.career')->middleware('loadMailConfig');

  Route::get('/news/fetch', [NewsController::class, 'fetchNews'])->name('web.api.news.fetch');
  Route::get('/blogs/fetch', [BlogController::class, 'fetchBlogs'])->name('web.api.blogs.fetch');
});

require __DIR__.'/backend/views-route.php';
require __DIR__.'/backend/apis-route.php';