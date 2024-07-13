<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Page::create([
        'template' => 'home',
        'name' => 'Home',
        'slug' => 'home',
        'path' => '/',
        'seo' => ['title' => 'Sample Page Title', 'description' => 'Sample page description'],
        'content' => ['body' => 'This is the content of the sample page.'],
        'lang' => 'kr'
      ]);
    }

    // php artisan db:seed --class=PageSeeder
}
