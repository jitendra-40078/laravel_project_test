<?php

namespace App\Http\Controllers\Backend\View\Cms\Blogs;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Blog Category',
      'activeMenu' => 'blog-category-list',
      'isListPage' => true,
      'customScriptName' => 'cms/blogs/category'
    ];

    $data = BlogCategory::with('admin:id,name')
            ->select('id', 'nameEn', 'nameKr', 'status', 'created_at', 'updated_at', 'admin_id')
            ->withCount('blog')
            ->get();

    $responseObject['blogCategoryRecords'] = $data;

    return view('backend.cms.blogs.category.list', $responseObject);
  }

  public function updatePage($id){
    $categoryData = BlogCategory::select('id', 'nameEn', 'nameKr', 'status')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$categoryData ){
      return redirect()->route('cms.blogcategory.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Blog Category',
      'activeMenu' => 'blog-category-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/blogs/category',
      'categoryData' => $categoryData
    ];

    return view('backend.cms.blogs.category.update', $responseObject);
  }
}
