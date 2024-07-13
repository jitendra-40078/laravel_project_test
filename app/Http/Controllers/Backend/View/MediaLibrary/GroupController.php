<?php

namespace App\Http\Controllers\Backend\View\MediaLibrary;

use App\Http\Controllers\Controller;
use App\Models\MediaLibraryGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Media Library Group',
      'activeMenu' => 'medialibrary-group-list',
      'isListPage' => true,
      'customScriptName' => 'media-library/group'
    ];

    // $data = MediaLibraryGroup::select('id', 'name', 'created_at', 'updated_at')->get();

    $data = MediaLibraryGroup::with('admin:id,name')
            ->select('id', 'name', 'status', 'created_at', 'updated_at', 'admin_id')
            ->withCount('media')
            ->get();

    $responseObject['mediaGroupRecords'] = $data;

    return view('backend.media-library.group.list', $responseObject);
  }

  public function updatePage($id){
    $groupData = MediaLibraryGroup::select('id', 'name', 'status')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$groupData ){
      return redirect()->route('cms.medialibrarygroup.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Media Library Group',
      'activeMenu' => 'medialibrary-group-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'media-library/group',
      'groupData' => $groupData
    ];

    return view('backend.media-library.group.update', $responseObject);
  }
}
