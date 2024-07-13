<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaLibraryGroup extends Model
{
  use HasFactory;

  public $timestamps = true;
  
  protected $fillable = ['name', 'status'];

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }
  
  public function media()
  {
    return $this->hasMany(MediaLibrary::class);
  }
}