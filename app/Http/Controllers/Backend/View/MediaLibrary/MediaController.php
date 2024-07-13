<?php

namespace App\Http\Controllers\Backend\View\MediaLibrary;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use Illuminate\Http\Request;

use App\Models\MediaLibrary;

class MediaController extends Controller
{

  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Media Library',
      'activeMenu' => 'medialibrary-list',
      'isListPage' => true,
      'enableMediaLibrary' => true,
      'customScriptName' => 'media-library/index'
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.media-library.list', $responseObject);
  }

  public function cropPage($id){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Media Library',
      'activeMenu' => 'medialibrary-crop',
      'isListPage' => false,
      'isFormPage' => true,
      'customScriptName' => 'media-library/crop'
    ];

    $mediaFile = MediaLibrary::where('code',$id)->first();
    
    if(!$mediaFile){
      return redirect()->route('cms.medialibrary.list');
    }

    $responseObject['mediaFile'] = $mediaFile;

    return view('backend.media-library.crop', $responseObject);
  }

  public function uploadPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Media Library',
      'activeMenu' => 'medialibrary-upload',
      'isListPage' => false,
      'isFormPage' => true,
      'customScriptName' => 'media-library/index'
    ];

    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.media-library.upload', $responseObject);
  }
  
}