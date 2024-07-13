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
    Schema::create('media_libraries', function (Blueprint $table) {
        $table->id();
        $table->uuid('code')->unique();
        $table->string('name');
        $table->string('objectKey');
        $table->text('path');
        $table->string('type');
        $table->string('size');
        $table->string('height')->nullable()->default(null);
        $table->string('width')->nullable()->default(null);
        $table->json('meta');
        $table->year('year');
        $table->enum('status', ['A', 'D']);
        $table->unsignedBigInteger('media_library_group_id')->nullable()->default(null);
        $table->unsignedBigInteger('admin_id');
        $table->foreign('media_library_group_id')->references('id')->on('media_library_groups');
        $table->foreign('admin_id')->references('id')->on('admins');
        $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('media_libraries');
  }
};
