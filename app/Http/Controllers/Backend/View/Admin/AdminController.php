<?php

namespace App\Http\Controllers\Backend\View\Admin;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Admin',
      'activeMenu' => 'admin-list',
      'isListPage' => true,
      'customScriptName' => 'admin/admin'
    ];

    $data = Admin::with('admin:id,name')
            ->select('id', 'title', 'location', 'language', 'status', 'created_at', 'updated_at', 'admin_id')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['jobRecords'] = $data;

    return view('backend.cms.job.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - Job',
      'activeMenu' => 'job-add',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/job'
    ];

    return view('backend.cms.job.add', $responseObject);
  }

  public function updatePage($id){
    $jobData = Admin::select('id', 'title', 'location', 'description', 'responsibility', 'language', 'status')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$jobData ){
      return redirect()->route('cms.job.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Job',
      'activeMenu' => 'job-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/job',
      'jobData' => $jobData
    ];

    return view('backend.cms.job.update', $responseObject);
  }
}
