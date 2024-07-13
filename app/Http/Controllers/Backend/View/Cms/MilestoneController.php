<?php

namespace App\Http\Controllers\Backend\View\Cms;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\Milestone;

use Illuminate\Http\Request;

class MilestoneController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Milestone',
      'activeMenu' => 'milestone-list',
      'isListPage' => true,
      'customScriptName' => 'cms/milestone'
    ];

    $data = Milestone::with('admin:id,name')
            ->select('id', 'year', 'month', 'content', 'status', 'language', 'created_at', 'updated_at', 'admin_id')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['milestoneRecord'] = $data;

    return view('backend.cms.milestone.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - Milestone',
      'activeMenu' => 'milestone-add',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/milestone'
    ];

    return view('backend.cms.milestone.add', $responseObject);
  }

  public function updatePage($id){
    $milestoneData = Milestone::select('id', 'content', 'year', 'month', 'language', 'status')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$milestoneData ){
      return redirect()->route('cms.milestone.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Milestone',
      'activeMenu' => 'milestone-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/milestone',
      'milestoneData' => $milestoneData
    ];

    return view('backend.cms.milestone.update', $responseObject);
  }
}
