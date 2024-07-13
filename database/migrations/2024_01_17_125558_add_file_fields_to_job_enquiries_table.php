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
    Schema::table('job_enquiries', function (Blueprint $table) {
      $table->string('job_title')->nullable();
      $table->string('file_name')->nullable();
      $table->string('file_type')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('job_enquiries', function (Blueprint $table) {
      $table->dropColumn('job_title');
      $table->dropColumn('file_type');
      $table->dropColumn('file_type');
    });
  }
};

// php artisan make:migration add_file_fields_to_job_enquiries_table --table=job_enquiries