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
    Schema::create('case_studies', function (Blueprint $table) {
      $table->id();
      $table->json('title');
      $table->json('content')->nullable();
      $table->string('duration')->nullable();
      $table->json('image')->nullable();
      $table->json('logo')->nullable();
      $table->json('report')->nullable();
      $table->enum('language', ['en', 'kr', 'both']);
      $table->enum('status', ['A', 'D']);
      $table->unsignedBigInteger('admin_id')->nullable();
      $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('case_studies');
  }
};
