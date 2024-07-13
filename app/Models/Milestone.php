<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
  use HasFactory;
  public $timestamps = true;

  protected $fillable = ['content', 'year', 'month', 'status'];

  protected $casts = [
    'content' => 'array'
  ];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }
}
