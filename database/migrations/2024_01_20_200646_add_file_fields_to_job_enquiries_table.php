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
      $table->string('cover_letter')->nullable();
      $table->string('cover_letter_name')->nullable();
      $table->string('cover_letter_type')->nullable();

      $table->string('other_doc')->nullable();
      $table->string('other_doc_name')->nullable();
      $table->string('other_doc_type')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('job_enquiries', function (Blueprint $table) {
      $table->dropColumn('cover_letter');
      $table->dropColumn('cover_letter_name');
      $table->dropColumn('cover_letter_type');

      $table->dropColumn('other_doc');
      $table->dropColumn('other_doc_name');
      $table->dropColumn('other_doc_type');
    });
  }
};
