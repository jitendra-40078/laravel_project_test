<?php

namespace App\Http\Controllers\Backend\View\Cms;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Case Study',
      'activeMenu' => 'casestudy-list',
      'isListPage' => true,
      'customScriptName' => 'cms/case-study'
    ];

    $data = CaseStudy::with('admin:id,name')
            ->select('id', 'title', 'status', 'language', 'created_at', 'updated_at', 'admin_id')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['casestudyRecords'] = $data;

    return view('backend.cms.case-study.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - Case Study',
      'activeMenu' => 'casestudy-add',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/case-study'
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.case-study.add', $responseObject);
  }

  public function updatePage($id){
    $casestudyData = CaseStudy::select('id', 'title', 'content', 'language', 'duration', 'status', 'logo', 'image', 'report')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$casestudyData ){
      return redirect()->route('cms.casestudy.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Case Study',
      'activeMenu' => 'casestudy-update',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/case-study',
      'casestudyData' => $casestudyData
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.case-study.update', $responseObject);
  }
}
