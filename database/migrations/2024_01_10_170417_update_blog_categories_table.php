<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('blog_categories', function (Blueprint $table) {
      // Convert existing 'name' values to JSON format
      // $categories = DB::table('blog_categories')->get();
      // foreach ($categories as $category) {
      //   $jsonName = json_encode(['en' => $category->name]);
      //   DB::table('blog_categories')
      //       ->where('id', $category->id)
      //       ->update(['name' => $jsonName]);
      // }

      // $table->dropColumn('slug');
      // $table->json('name')->change();


      // Add a new 'nameEn' column
      Schema::table('blog_categories', function (Blueprint $table) {
        $table->string('nameEn')->after('name');
        $table->string('nameKr');
      });
    
      // Transfer data from 'name' to 'nameEn'
      DB::table('blog_categories')->update([
        'nameEn' => DB::raw('`name`')
      ]);
    
      // Drop the old 'name' column
      Schema::table('blog_categories', function (Blueprint $table) {
        $table->dropColumn('name');
      });

    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('blog_categories', function (Blueprint $table) {

      // $table->string('slug');
      // $table->string('name')->change();

      // Add the 'name' column back
      Schema::table('blog_categories', function (Blueprint $table) {
        $table->string('name')->before('nameEn');
      });

      // Transfer data back to 'name' from 'nameEn'
      DB::table('blog_categories')->update([
        'name' => DB::raw('`nameEn`')
      ]);

      // Drop the 'nameEn' column
      Schema::table('blog_categories', function (Blueprint $table) {
        $table->dropColumn('nameEn');
        $table->dropColumn('nameKr');
      });
    });
  }
};
