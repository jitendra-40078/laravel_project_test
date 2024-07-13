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
    Schema::table('media_library_groups', function (Blueprint $table) {
      $table->unsignedBigInteger('admin_id'); // Assuming the admin ID is of type BigInteger
      $table->foreign('admin_id')->references('id')->on('admins');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('media_library_groups', function (Blueprint $table) {
      $table->dropForeign(['admin_id']);
      $table->dropColumn('admin_id');
    });
  }
};
