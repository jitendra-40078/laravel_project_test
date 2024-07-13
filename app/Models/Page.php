<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = ['template', 'name', 'slug', 'path', 'seo', 'content', 'lang'];

    protected static function boot()
    {
      parent::boot();

      static::creating(function ($page) {
        $page->code = Str::uuid();
      });
    }

    public function setContentAttribute($value)
    {
      $this->attributes['content'] = json_encode($value);
    }

    public function getContentAttribute($value)
    {
      return json_decode($value, true);
    }

    public function setSeoAttribute($value)
    {
      $this->attributes['seo'] = json_encode($value);
    }

    public function getSeoAttribute($value)
    {
      return json_decode($value, true);
    }

    public function testimonials()
    {
      return $this->belongsToMany(Testimonial::class);
    }

    public function admin()
    {
      return $this->belongsTo(Admin::class);
    }
}
