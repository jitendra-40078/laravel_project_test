<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  use HasFactory;

  public $timestamps = true;

  protected $casts = [
    'title' => 'array',
    'location' => 'array',
    'description' => 'array',
    'responsibility' => 'array'
  ];
  
  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }

  public function enquiry()
  {
    return $this->hasMany(JobEnquiry::class);
  }
}