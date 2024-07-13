<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
  use HasFactory;
  public $timestamps = true;

  protected $fillable = ['name', 'map', 'phone', 'fax', 'email', 'address', 'status'];

  protected $casts = [
    'name' => 'array',
    'address' => 'array'
  ];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }
}
