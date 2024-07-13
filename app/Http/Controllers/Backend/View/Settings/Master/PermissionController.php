<?php

namespace App\Http\Controllers\Backend\View\Settings\Master;

use App\Http\Controllers\Controller;
use App\Models\Permission;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Role Permissions',
      'activeMenu' => 'role-permissions-list',
      'isListPage' => true,
      'customScriptName' => 'settings/master/permission'
    ];

    $data = Permission::select('id', 'name', 'status', 'created_at', 'updated_at')
                        ->get();

    $responseObject['permissionRecords'] = $data;

    return view('backend.settings.masters.permissions.list', $responseObject);
  }

  public function updatePage($id){
    $permissionData = Permission::select('id', 'name', 'status')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$permissionData ){
      return redirect()->route('cms.master-permission.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Role Permissions',
      'activeMenu' => 'role-permissions-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'settings/master/permission',
      'permissionData' => $permissionData
    ];

    return view('backend.settings.masters.permissions.update', $responseObject);
  }
}
