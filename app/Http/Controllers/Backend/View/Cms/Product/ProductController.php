<?php

namespace App\Http\Controllers\Backend\View\Cms\Product;

use App\Http\Controllers\Controller;
use App\Utility\CommonActions;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Product',
      'activeMenu' => 'product-list',
      'isListPage' => true,
      'customScriptName' => 'cms/product/product'
    ];

    $data = Product::with(['admin:id,name'])
            ->select('id', 'name', 'image', 'status', 'language', 'created_at', 'updated_at', 'admin_id')
            ->orderBy('created_at', 'desc')
            ->get();

    $responseObject['productRecords'] = $data;

    return view('backend.cms.product.list', $responseObject);
  }

  public function addPage(){

    $responseObject = [
      'pageTitle' => 'DareeSoft - Product',
      'activeMenu' => 'product-add',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => false,
      'customScriptName' => 'cms/product/product'
    ];

    $properties = CommonActions::getProductProperties();
    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['productProperties'] = $properties;
    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.product.add', $responseObject);
  }

  public function updatePage($id){
    $productData = Product::select('id', 'name', 'description', 'image', 'features', 'properties', 'language', 'status')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$productData ){
      return redirect()->route('cms.product.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Product',
      'activeMenu' => 'product-update',
      'enableMediaLibrary' => true,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/product/product',
      'productData' => $productData
    ];

    $properties = CommonActions::getProductProperties();
    $mediaLibraryYears = CommonActions::getMediaLibraryYears();
    $mediaLibraryGroups = CommonActions::getMediaLibraryGroups();

    $responseObject['productProperties'] = $properties;
    $responseObject['mediaLibraryYears'] = $mediaLibraryYears;
    $responseObject['mediaLibraryGroups'] = $mediaLibraryGroups;

    return view('backend.cms.product.update', $responseObject);
  }
}