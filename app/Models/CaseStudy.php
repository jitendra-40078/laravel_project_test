<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
  use HasFactory;

  public $timestamps = true;

  protected $fillable = ['title', 'content', 'duration', 'language'];

  protected $casts = [
    'title' => 'array',
    'content' => 'array',
    'image' => 'array',
    'logo' => 'array',
    'report' => 'array',
  ];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }
}
