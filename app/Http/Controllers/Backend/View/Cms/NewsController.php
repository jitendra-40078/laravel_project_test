<?php

namespace App\Http\Controllers\Backend\View\Cms;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - News',
      'activeMenu' => 'news-list',
      'isListPage' => true,
      'customScriptName' => 'cms/news'
    ];

    $data = News::with('admin:id,name')
            ->select('id', 'title', 'status', 'language', 'type', 'is_featured', 'publish_date', 'updated_at', 'admin_id')
            ->orderBy('publish_date', 'desc')
            ->get();

    $responseObject['newsRecords'] = $data;

    return view('backend.cms.news.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - News',
      'activeMenu' => 'news-add',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/news'
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.news.add', $responseObject);
  }

  public function updatePage($id){
    $newsData = News::select('id', 'name', 'title', 'content', 'image', 'type', 'short_description', 'language', 'status', 'is_featured', 'publish_date')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$newsData ){
      return redirect()->route('cms.news.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - News',
      'activeMenu' => 'news-update',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/news',
      'newsData' => $newsData
    ];

    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.news.update', $responseObject);
  }
}