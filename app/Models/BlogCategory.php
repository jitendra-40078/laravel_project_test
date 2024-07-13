<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
  use HasFactory;

  public $timestamps = true;

  protected $fillable = [];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }

  public function blog()
  {
    return $this->hasMany(Blog::class);
  }
}