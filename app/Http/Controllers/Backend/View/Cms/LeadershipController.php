<?php

namespace App\Http\Controllers\Backend\View\Cms;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\Leadership;

use Illuminate\Http\Request;

class LeadershipController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Leadership',
      'activeMenu' => 'leadership-list',
      'isListPage' => true,
      'customScriptName' => 'cms/leadership'
    ];

    $data = Leadership::with('admin:id,name')
            ->select('id', 'name', 'status', 'language', 'created_at', 'updated_at', 'admin_id')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['leadershipRecords'] = $data;

    return view('backend.cms.leadership.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - Leadership',
      'activeMenu' => 'leadership-add',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/leadership'
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.leadership.add', $responseObject);
  }

  public function updatePage($id){
    $leadershipData = Leadership::select('id', 'name', 'designation', 'description', 'language', 'status', 'image')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$leadershipData ){
      return redirect()->route('cms.leadership.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Leadership',
      'activeMenu' => 'leadership-update',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/leadership',
      'leadershipData' => $leadershipData
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.leadership.update', $responseObject);
  }
}
