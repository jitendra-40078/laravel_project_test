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
      Schema::create('pages', function (Blueprint $table) {
        $table->id();
        $table->uuid('code')->unique();
        $table->string('template');
        $table->string('name');
        $table->string('slug');
        $table->string('path');
        $table->json('seo');
        $table->json('content');
        $table->enum('lang', ['en', 'kr']);
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
