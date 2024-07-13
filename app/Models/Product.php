<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
  use HasFactory;

  public $timestamps = true;

  protected $casts = [
    'name' => 'array',
    'description' => 'array',
    'image' => 'array',
    'features' => 'array',
    'properties' => 'array',
    'text' => 'array'
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($property) {
      $property->code = Str::uuid();
    });
  }

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }
}
