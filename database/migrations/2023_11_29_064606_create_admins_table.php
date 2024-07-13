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
    Schema::create('admins', function (Blueprint $table) {
      $table->id();
      $table->text('image');
      $table->string('name');
      $table->string('email')->unique();
      $table->string('username')->unique();
      $table->text('password_txt');
      $table->text('password_enc');
      $table->enum('type', ['A', 'SA']);
      $table->integer('role_id')->nullable();
      $table->enum('status', ['A', 'D']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('admins');
  }
};
