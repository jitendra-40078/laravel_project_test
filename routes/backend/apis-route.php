<?php

use App\Http\Controllers\Backend\Api\AuthController;
use App\Http\Controllers\Backend\Api\PageController;
use App\Http\Controllers\Backend\Api\MediaLibraryController;

use App\Http\Controllers\Backend\Api\Admin\{AccountApiController};

use App\Http\Controllers\Backend\Api\Cms\{ TestimonialApiController, CaseStudyApiController, JobApiController, MilestoneApiController, LeadershipApiController, OfficeApiController, NewsApiController};

use App\Http\Controllers\Backend\Api\Cms\Blogs\{CategoryApiController, BlogApiController};
use App\Http\Controllers\Backend\Api\Cms\Product\{PropertyApiController, ProductApiController};

use App\Http\Controllers\Backend\Api\Settings\{MailApiController};
use App\Http\Controllers\Backend\Api\Settings\Master\{PermissionApiController};

use Illuminate\Support\Facades\Route;

/**
 * Backend api routes
 */
Route::prefix('/api/cms')->group(function(){
  
  Route::middleware(['guest:admin'])->group(function(){
    Route::post('/auth/login', [AuthController::class, 'login'])->name('api.admin.login');
  });

  Route::middleware(['auth:admin'])->group(function(){
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('api.admin.logout');

    Route::controller(AccountApiController::class)->group(function () {
      Route::post('/profile/update', 'profileUpdate')->name('api.account.profile.update');
      Route::post('/password/update', 'passwordUpdate')->name('api.account.password.update');
    });
    
    Route::prefix('/media-library')->group(function(){
      Route::post('/group/create', [MediaLibraryController::class, 'groupCreate'])->name('api.mediaLibrary.group.create');
      Route::post('/group/update', [MediaLibraryController::class, 'groupUpdate'])->name('api.mediaLibrary.group.update');
      Route::post('/group/delete', [MediaLibraryController::class, 'groupDelete'])->name('api.mediaLibrary.group.delete');

      Route::post('/file/upload', [MediaLibraryController::class, 'fileUpload'])->name('api.mediaLibrary.file.upload');
      Route::post('/file/delete', [MediaLibraryController::class, 'fileDelete'])->name('api.mediaLibrary.file.delete');
      Route::get('/file/fetch', [MediaLibraryController::class, 'fetchMedia'])->name('api.mediaLibrary.media.fetch');
    });

    // Route::get('/page/create', [PageController::class, 'store'])->name('api.page.create');
    Route::post('/page/update', [PageController::class, 'update'])->name('api.page.update');
    
    Route::prefix('/testimonial')->group(function(){
      Route::post('/create', [TestimonialApiController::class, 'store'])->name('api.testimonial.store');
      Route::post('/update', [TestimonialApiController::class, 'update'])->name('api.testimonial.update');
      Route::post('/delete', [TestimonialApiController::class, 'delete'])->name('api.testimonial.delete');
    });

    Route::prefix('/case-study')->group(function(){
      Route::post('/create', [CaseStudyApiController::class, 'store'])->name('api.casestudy.store');
      Route::post('/update', [CaseStudyApiController::class, 'update'])->name('api.casestudy.update');
      Route::post('/delete', [CaseStudyApiController::class, 'delete'])->name('api.casestudy.delete');
    });

    Route::prefix('/milestone')->group(function(){
      Route::post('/create', [MilestoneApiController::class, 'store'])->name('api.milestone.store');
      Route::post('/update', [MilestoneApiController::class, 'update'])->name('api.milestone.update');
      Route::post('/delete', [MilestoneApiController::class, 'delete'])->name('api.milestone.delete');
    });

    Route::prefix('/leadership')->group(function(){
      Route::post('/create', [LeadershipApiController::class, 'store'])->name('api.leadership.store');
      Route::post('/update', [LeadershipApiController::class, 'update'])->name('api.leadership.update');
      Route::post('/delete', [LeadershipApiController::class, 'delete'])->name('api.leadership.delete');
    });

    Route::prefix('/office')->group(function(){
      Route::post('/create', [OfficeApiController::class, 'store'])->name('api.office.store');
      Route::post('/update', [OfficeApiController::class, 'update'])->name('api.office.update');
      Route::post('/delete', [OfficeApiController::class, 'delete'])->name('api.office.delete');
    });

    Route::prefix('/news')->group(function(){
      Route::post('/create', [NewsApiController::class, 'store'])->name('api.news.store');
      Route::post('/update', [NewsApiController::class, 'update'])->name('api.news.update');
      Route::post('/delete', [NewsApiController::class, 'delete'])->name('api.news.delete');
    });

    Route::prefix('/job')->group(function(){
      Route::post('/create', [JobApiController::class, 'store'])->name('api.job.store');
      Route::post('/update', [JobApiController::class, 'update'])->name('api.job.update');
      Route::post('/delete', [JobApiController::class, 'delete'])->name('api.job.delete');
    });

    Route::prefix('/blog')->group(function(){
      Route::controller(CategoryApiController::class)->group(function () {
        Route::post('/category/create', 'store')->name('api.blogcategory.store');
        Route::post('/category/update', 'update')->name('api.blogcategory.update');
        Route::post('/category/delete', 'delete')->name('api.blogcategory.delete');
      });

      Route::controller(BlogApiController::class)->group(function () {
        Route::post('/create', 'store')->name('api.blog.store');
        Route::post('/update', 'update')->name('api.blog.update');
        Route::post('/delete', 'delete')->name('api.blog.delete');
      });
    });

    Route::prefix('/product')->group(function(){
      Route::controller(PropertyApiController::class)->group(function () {
        Route::post('/property/create', 'store')->name('api.productProperty.store');
        Route::post('/property/update', 'update')->name('api.productProperty.update');
        Route::post('/property/delete', 'delete')->name('api.productProperty.delete');
      });

      Route::controller(ProductApiController::class)->group(function () {
        Route::post('/create', 'store')->name('api.product.store');
        Route::post('/update', 'update')->name('api.product.update');
        Route::post('/delete', 'delete')->name('api.product.delete');
      });
    });

    Route::prefix('/settings')->group(function(){
      Route::post('/smtp/update', [MailApiController::class, 'updateSmtp'])->name('api.settings.smtp.update');
      Route::post('/career-email/update', [MailApiController::class, 'updateCareerEmails'])->name('api.settings.careeremail.update');
      Route::post('/contact-email/update', [MailApiController::class, 'updateContactEmails'])->name('api.settings.contactemail.update');
    });

    Route::prefix('/master')->group(function(){
      Route::controller(PermissionApiController::class)->group(function () {
        Route::post('/permission/create', 'store')->name('api.master-permission.store');
        Route::post('/permission/update', 'update')->name('api.master-permission.update');
        Route::post('/permission/delete', 'delete')->name('api.master-permission.delete');
      });
    });

  });
});