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
    Schema::create('milestones', function (Blueprint $table) {
      $table->id();
      $table->json('content');
      $table->year('year')->nullable();
      $table->integer('month')->nullable();
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
    Schema::dropIfExists('milestones');
  }
};
