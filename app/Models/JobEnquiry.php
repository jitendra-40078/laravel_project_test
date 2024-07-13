<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEnquiry extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function job()
    {
      return $this->belongsTo(Job::class, 'job_id');
    }
}
