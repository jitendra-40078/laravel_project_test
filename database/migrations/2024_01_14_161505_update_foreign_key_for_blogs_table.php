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
    // Ensure the column is nullable
    Schema::table('blogs', function (Blueprint $table) {
      $table->unsignedBigInteger('blog_category_id')->nullable()->change();
    });

    // Drop the existing foreign key constraint
    Schema::table('blogs', function (Blueprint $table) {
      $table->dropForeign(['blog_category_id']);
    });

    // Add the new foreign key constraint with onDelete('set null')
    Schema::table('blogs', function (Blueprint $table) {
      $table->foreign('blog_category_id')
            ->references('id')
            ->on('blog_categories')
            ->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    // Reverse the foreign key changes
    Schema::table('blogs', function (Blueprint $table) {
      $table->dropForeign(['blog_category_id']);

      $table->foreign('blog_category_id')
            ->references('id')
            ->on('blog_categories');
    });
  }
};
