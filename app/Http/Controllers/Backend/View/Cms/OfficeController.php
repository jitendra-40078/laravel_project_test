<?php

namespace App\Http\Controllers\Backend\View\Cms;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Offices',
      'activeMenu' => 'office-list',
      'isListPage' => true,
      'customScriptName' => 'cms/office'
    ];

    $data = Office::with('admin:id,name')
            ->select('id', 'name', 'status', 'language', 'created_at', 'updated_at', 'admin_id')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['officeRecords'] = $data;

    return view('backend.cms.office.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - Offices',
      'activeMenu' => 'office-add',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/office'
    ];

    return view('backend.cms.office.add', $responseObject);
  }

  public function updatePage($id){
    $officeData = Office::select('id', 'name', 'map', 'phone', 'fax', 'email', 'address', 'language', 'status')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$officeData ){
      return redirect()->route('cms.office.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Offices',
      'activeMenu' => 'office-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/office',
      'officeData' => $officeData
    ];

    return view('backend.cms.office.update', $responseObject);
  }
}
