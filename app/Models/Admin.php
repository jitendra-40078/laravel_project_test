<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
  use HasFactory;
  use HasRoles;
  
  protected $guard = 'admin';
  public $timestamps = true;
  
  protected $fillable = [
    'image', 'name', 'email', 'username', 'password_txt', 'password_enc', 'type', 'status'
  ];

  protected $hidden = [
    'password_txt',
  ];

  public function getAuthPassword(){
    return $this->password_enc;
  }

  public function testimonials()
  {
    return $this->hasMany(Testimonial::class);
  }

  public function media()
  {
    return $this->hasMany(MediaLibrary::class);
  }
}