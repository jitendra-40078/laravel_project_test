<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  use HasFactory;

  public $timestamps = true;

  protected $casts = [
    'seo' => 'array',
    'title' => 'array',
    'short_description' => 'array',
    'content' => 'array',
    'image' => 'array'
  ];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }

  public function category()
  {
    return $this->belongsTo(BlogCategory::class, 'blog_category_id');
  }
}
