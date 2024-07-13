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
    Schema::table('admins', function (Blueprint $table) {
      $table->string('password_token')->nullable();
      $table->dateTime('token_expiry_at')->nullable();
      $table->integer('attempts')->nullable();
      $table->enum('is_blocked', ['Y','N'])->nullable()->default('N');
      $table->dateTime('unblock_at')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('admins', function (Blueprint $table) {
      $table->dropColumn('password_token');
      $table->dropColumn('token_expiry_at');
      $table->dropColumn('attempts');
      $table->dropColumn('is_blocked');
      $table->dropColumn('unblock_at');
    });
  }
};
