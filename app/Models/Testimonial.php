<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
  use HasFactory;
  public $timestamps = true;

  protected $fillable = ['title', 'content', 'year', 'language'];

  protected $casts = [
    'image' => 'array', // or 'object' if you prefer to work with a stdClass object
  ];

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = json_encode($value);
  }

  public function getTitleAttribute($value)
  {
    return json_decode($value, true);
  }

  public function setContentAttribute($value)
  {
    $this->attributes['content'] = json_encode($value);
  }

  public function getContentAttribute($value)
  {
    return json_decode($value, true);
  }

  public function admin()
  {
    return $this->belongsTo(Admin::class);
  }

  public function pages()
  {
    return $this->belongsToMany(Page::class);
  }
}
