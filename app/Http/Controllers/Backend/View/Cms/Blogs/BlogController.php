<?php

namespace App\Http\Controllers\Backend\View\Cms\Blogs;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Blogs',
      'activeMenu' => 'blogs-list',
      'isListPage' => true,
      'customScriptName' => 'cms/blogs/blog'
    ];

    $data = Blog::with(['admin:id,name', 'category:id,nameEn,nameKr'])
            ->select('id', 'title', 'status', 'language', 'views', 'is_trending', 'is_popular', 'publish_date', 'updated_at', 'admin_id', 'blog_category_id')
            ->orderBy('publish_date', 'desc')
            ->get();

    $responseObject['blogRecords'] = $data;

    return view('backend.cms.blogs.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - Blogs',
      'activeMenu' => 'blogs-add',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/blogs/blog'
    ];

    $blogCategories = CommonActions::getBlogCategories();
    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['blogCategories'] = $blogCategories;
    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.blogs.add', $responseObject);
  }

  public function updatePage($id){
    $blogData = Blog::select('id', 'name', 'seo', 'title', 'short_description', 'content', 'image', 'language', 'status', 'is_trending', 'is_popular', 'publish_date', 'blog_category_id')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$blogData ){
      return redirect()->route('cms.blog.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Blogs',
      'activeMenu' => 'blogs-update',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/blogs/blog',
      'blogData' => $blogData
    ];

    $blogCategories = CommonActions::getBlogCategories();
    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['blogCategories'] = $blogCategories;
    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.blogs.update', $responseObject);
  }
}