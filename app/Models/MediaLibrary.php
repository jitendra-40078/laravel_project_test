<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MediaLibrary extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['name', 'objectKey', 'path', 'type', 'size', 'height', 'width', 'meta', 'year', 'status'];

    protected static function boot()
    {
      parent::boot();

      static::creating(function ($media) {
        $media->code = Str::uuid();
      });
    }

    public function setMetaAttribute($value)
    {
      $this->attributes['meta'] = json_encode($value);
    }

    public function getMetaAttribute($value)
    {
      return json_decode($value, true);
    }

    public static function getDistinctYears()
    {
        return self::select('year')->distinct()->orderBy('year', 'desc')->get();
    }

    public function group()
    {
      return $this->belongsTo(MediaLibraryGroup::class, 'media_library_group_id');
    }

    public function admin()
    {
      return $this->belongsTo(Admin::class);
    }
}
