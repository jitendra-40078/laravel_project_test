<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
  use HasFactory;
  public $timestamps = true;

  protected $fillable = ['name', 'designation', 'image', 'description'];

  protected $casts = [
    'name' => 'array',
    'designation' => 'array',
    'image' => 'array',
    'description' => 'array'
  ];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }
}
