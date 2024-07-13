<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductProperty extends Model
{
  use HasFactory;

  public $timestamps = true;

  protected $fillable = [];

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
