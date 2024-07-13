<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  use HasFactory;
  
  protected $table = 'permissions';
  
  public $timestamps = true;

  protected $fillable = [
    'name', 
    'guard_name', 
    'status'
  ];

  public function createdBy(){
    return $this->belongsTo(Admin::class, 'created_by');
  }

  public function updatedBy(){
    return $this->belongsTo(Admin::class, 'updated_by');
  }

}