<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  use HasFactory;
  public $timestamps = true;

  protected $casts = [
    'title' => 'array',
    'content' => 'array',
    'image' => 'array',
    'short_description' => 'array'
  ];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }
}
