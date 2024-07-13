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
    Schema::create('testimonials', function (Blueprint $table) {
      $table->id();
      $table->json('title');
      $table->json('content');
      $table->year('year');
      $table->enum('language', ['en', 'kr', 'both']);
      $table->enum('status', ['A', 'D']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('testimonials');
  }
};
