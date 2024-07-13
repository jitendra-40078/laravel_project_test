<?php

namespace App\Http\Controllers\Backend\View;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Pages',
      'activeMenu' => 'page-list',
      'isListPage' => true,
      'customScriptName' => 'page'
    ];

    $data = Page::with('admin:id,name')
            ->select('id', 'code', 'name', 'slug', 'path', 'lang', 'updated_at', 'admin_id')
            ->get();

    $responseObject['pageRecords'] = $data;

    return view('backend.page.list', $responseObject);
  }

  public function updatePage($code){
    $pageData = Page::select('code', 'name', 'slug', 'template', 'seo', 'content', 'lang')
                ->where('code', $code)
                ->first(); // first() method will retrun null if no record is present

    if( !$pageData ){
      return redirect()->route('cms.page.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Update Page',
      'activeMenu' => 'page-update',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'page',
      'pageData' => $pageData
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;
    
    return view('backend.page.update', $responseObject);
  }
}
