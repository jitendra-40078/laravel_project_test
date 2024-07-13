<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role;

class RoleModel extends Role
{
  use HasFactory;
  
  protected $table = 'roles';
  
  public $timestamps = true;

  protected $fillable = [
    'name', 
    'guard_name', 
    'status'
  ];

  public function author(){
    return $this->belongsTo(Admin::class, 'created_by');
  }

  public function modifier(){
    return $this->belongsTo(Admin::class, 'updated_by');
  }

  /**
   *  @author - Amit Kashte
   *  @function - function to fetch role list
   */
  public static function fetchRoles(){
    $data = self::select('id', 'name')->where('status', 'A')->get();

    $collection = [];

    foreach ($data as $d) {
      $collection[] = [
        "id" => $d->id,
        "name" => $d->name
      ];
    }

    return $collection;
  }
}