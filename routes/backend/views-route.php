<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\View\{AuthController, PageController};

use App\Http\Controllers\Backend\View\Admin\{AccountController};
use App\Http\Controllers\Backend\View\MediaLibrary\{GroupController, MediaController};

use App\Http\Controllers\Backend\View\Cms\{TestimonialController, CaseStudyController, JobController, LeadershipController, MilestoneController, NewsController, OfficeController};
use App\Http\Controllers\Backend\View\Cms\Blogs\{ CategoryController as BlogCategoryController, BlogController};
use App\Http\Controllers\Backend\View\Cms\Product\{ PropertyController as ProductPropertyController, ProductController};

use App\Http\Controllers\Backend\View\Enquiry\{ContactController, NewsletterController, CareerController};
use App\Http\Controllers\Backend\View\Settings\{EmailController};
use App\Http\Controllers\Backend\View\Settings\Master\{PermissionController};

/**
 * Backend routes
 */
Route::prefix('/cms')->group(function(){
  
  Route::middleware(['guest:admin'])->group(function(){
    Route::controller(AuthController::class)->group(function () {
      Route::get('/login', 'loginPage')->name('cms.auth.login');
    });
  });

  Route::middleware(['auth:admin'])->group(function(){

    Route::controller(AccountController::class)->group(function () {
      Route::get('/dashboard', 'dashboardPage')->name('cms.account.dashboard');
      Route::get('/my-profile', 'profilePage')->name('cms.account.profile');
    });

    Route::controller(PageController::class)->group(function () {
      Route::get('/pages', 'listPage')->name('cms.page.list');
      Route::get('/page/update/{code}', 'updatePage')->name('cms.page.update');
    });

    Route::prefix('/media-library')->group(function(){
      
      Route::controller(MediaController::class)->group(function () {
        Route::get('/', 'listPage')->name('cms.medialibrary.list');
        Route::get('/uplaod', 'uploadPage')->name('cms.medialibrary.upload');
        Route::get('/crop/{id}', 'cropPage')->name('cms.medialibrary.crop');
      });

      Route::controller(GroupController::class)->group(function () {
        Route::get('/group', 'listPage')->name('cms.medialibrarygroup.list');
        Route::get('/group/update/{id}', 'updatePage')->name('cms.medialibrarygroup.update');
      });

    });

    Route::controller(TestimonialController::class)->group(function () {
      Route::get('/testimonial', 'listPage')->name('cms.testimonial.list');
      Route::get('/testimonial/add', 'addPage')->name('cms.testimonial.add');
      Route::get('/testimonial/update/{id}', 'updatePage')->name('cms.testimonial.update');
    });

    Route::controller(CaseStudyController::class)->group(function () {
      Route::get('/case-study', 'listPage')->name('cms.casestudy.list');
      Route::get('/case-study/add', 'addPage')->name('cms.casestudy.add');
      Route::get('/case-study/update/{id}', 'updatePage')->name('cms.casestudy.update');
    });

    Route::controller(LeadershipController::class)->group(function () {
      Route::get('/leadership', 'listPage')->name('cms.leadership.list');
      Route::get('/leadership/add', 'addPage')->name('cms.leadership.add');
      Route::get('/leadership/update/{id}', 'updatePage')->name('cms.leadership.update');
    });

    Route::controller(MilestoneController::class)->group(function () {
      Route::get('/milestone', 'listPage')->name('cms.milestone.list');
      Route::get('/milestone/add', 'addPage')->name('cms.milestone.add');
      Route::get('/milestone/update/{id}', 'updatePage')->name('cms.milestone.update');
    });

    Route::controller(OfficeController::class)->group(function () {
      Route::get('/office', 'listPage')->name('cms.office.list');
      Route::get('/office/add', 'addPage')->name('cms.office.add');
      Route::get('/office/update/{id}', 'updatePage')->name('cms.office.update');
    });

    Route::controller(NewsController::class)->group(function () {
      Route::get('/news', 'listPage')->name('cms.news.list');
      Route::get('/news/add', 'addPage')->name('cms.news.add');
      Route::get('/news/update/{id}', 'updatePage')->name('cms.news.update');
    });

    Route::prefix('/blog')->group(function(){
      Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('/category', 'listPage')->name('cms.blogcategory.list');
        Route::get('/category/update/{id}', 'updatePage')->name('cms.blogcategory.update');
      });
  
      Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'listPage')->name('cms.blog.list');
        Route::get('/add', 'addPage')->name('cms.blog.add');
        Route::get('/update/{id}', 'updatePage')->name('cms.blog.update');
      });
    });

    Route::prefix('/product')->group(function(){
      Route::controller(ProductPropertyController::class)->group(function () {
        Route::get('/property', 'listPage')->name('cms.productProperty.list');
        Route::get('/property/update/{id}', 'updatePage')->name('cms.productProperty.update');
      });
  
      Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'listPage')->name('cms.product.list');
        Route::get('/add', 'addPage')->name('cms.product.add');
        Route::get('/update/{id}', 'updatePage')->name('cms.product.update');
      });
    });

    Route::controller(JobController::class)->group(function () {
      Route::get('/job', 'listPage')->name('cms.job.list');
      Route::get('/job/add', 'addPage')->name('cms.job.add');
      Route::get('/job/update/{id}', 'updatePage')->name('cms.job.update');
    });

    Route::prefix('/enquiry')->group(function(){
      Route::get('/contact-us', [ContactController::class, 'listPage'])->name('cms.enquiry.contact');
      Route::get('/newsletter', [NewsletterController::class, 'listPage'])->name('cms.enquiry.newsletter');
      Route::get('/career', [CareerController::class, 'listPage'])->name('cms.enquiry.career');
    });

    Route::prefix('/settings')->group(function(){
      Route::get('/email', [EmailController::class, 'formPage'])->name('cms.settings.email');
    });

    Route::prefix('/master')->group(function(){
      Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission', 'listPage')->name('cms.master-permission.list');
        Route::get('/permission/update/{id}', 'updatePage')->name('cms.master-permission.update');
      });
    });

  });
});