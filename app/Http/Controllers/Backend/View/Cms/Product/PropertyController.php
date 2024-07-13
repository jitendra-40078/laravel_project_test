<?php

namespace App\Http\Controllers\Backend\View\Cms\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductProperty;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
  public function listPage(){
    $responseObject = [
      'pageTitle' => 'DareeSoft - Product Property',
      'activeMenu' => 'product-property-list',
      'isListPage' => true,
      'customScriptName' => 'cms/product/property'
    ];

    $data = ProductProperty::with('admin:id,name')
            ->select('id', 'nameEn', 'nameKr', 'status', 'created_at', 'updated_at', 'admin_id')
            ->get();

    $responseObject['propertyRecords'] = $data;

    return view('backend.cms.product.property.list', $responseObject);
  }

  public function updatePage($id){
    $propertyData = ProductProperty::select('id', 'nameEn', 'nameKr', 'status')
                ->where('id', $id)
                ->first(); // first() method will retrun null if no record is present

    if( !$propertyData ){
      return redirect()->route('cms.productProperty.list');
    }

    $responseObject = [
      'pageTitle' => 'DareeSoft - Product Property',
      'activeMenu' => 'product-property-update',
      'enableMediaLibrary' => false,
      'isFormPage' => true,
      'isEditFormPage' => true,
      'customScriptName' => 'cms/product/property',
      'propertyData' => $propertyData
    ];

    return view('backend.cms.product.property.update', $responseObject);
  }
}
