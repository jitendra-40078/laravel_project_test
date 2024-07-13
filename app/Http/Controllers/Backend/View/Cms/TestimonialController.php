<?php

namespace App\Http\Controllers\Backend\View\Cms;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Testimonial',
      'activeMenu' => 'testimonial-list',
      'isListPage' => true,
      'customScriptName' => 'cms/testimonial'
    ];

    $data = Testimonial::with('admin:id,name')
            ->select('id', 'title', 'status', 'language', 'created_at', 'updated_at', 'admin_id')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['testimonialRecords'] = $data;

    return view('backend.cms.testimonial.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - Testimonial',
      'activeMenu' => 'testimonial-add',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/testimonial'
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.testimonial.add', $responseObject);
  }

  public function updatePage($id){
    $testimonialData = Testimonial::select('id', 'title', 'content', 'language', 'year', 'status', 'image')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$testimonialData ){
      return redirect()->route('cms.testimonial.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Testimonial',
      'activeMenu' => 'testimonial-update',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/testimonial',
      'testimonialData' => $testimonialData
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.testimonial.update', $responseObject);
  }
}
