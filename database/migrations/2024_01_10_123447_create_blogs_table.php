<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('blogs', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('slug');
      $table->json('seo');
      $table->json('title');
      $table->json('short_description');
      $table->json('content');
      $table->json('image');
      $table->unsignedBigInteger('views');
      $table->enum('language', ['en', 'kr', 'both']);
      $table->enum('status', ['A', 'D']);
      $table->enum('is_trending', ['Y', 'N'])->nullable();
      $table->enum('is_popular', ['Y', 'N'])->nullable();
      $table->date('publish_date')->nullable();
      $table->unsignedBigInteger('blog_category_id')->nullable()->default(null);
      $table->unsignedBigInteger('admin_id')->nullable();
      $table->foreign('blog_category_id')->references('id')->on('blog_categories');
      $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('blogs');
  }
};