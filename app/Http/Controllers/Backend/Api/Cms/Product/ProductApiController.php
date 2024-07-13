<?php

namespace App\Http\Controllers\Backend\Api\Cms\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Http\Controllers\Backend\Api\Validators\Cms\Product\Product as ProductValidator;
use App\Utility\ApiResponse;
use App\Utility\CommonActions;
use App\Models\Product;

class ProductApiController extends Controller
{
  public function store(Request $request){

    $language = $request->language ?? '';
    $properties = CommonActions::getProductProperties();
    
    $rules = ProductValidator::rules($request, $language, 'new', null, $properties);
    $messages = ProductValidator::messages($request, $properties);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new Product();
        $newRecord->admin_id = $adminId;

        $newRecord->name = $this->getNameObject($validatedData);
        $newRecord->description = $this->getDescriptionObject($validatedData);
        $newRecord->image = $this->getImageObject($validatedData);
        $newRecord->text = $this->getTextObject($validatedData);
        $newRecord->features = $this->getFeaturesObject($validatedData);
        $newRecord->properties = $this->getPropertyObject($validatedData, $properties, []);
        $newRecord->language = $validatedData['language'];
        $newRecord->status = $validatedData['status'];

        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessRedirect', 'Success', 'success', 'recordAdded', 'productList');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function update(Request $request){

    $productId = $request->id ?? '';
    $language = $request->language ?? '';
    $properties = CommonActions::getProductProperties();

    $productRecord = Product::where('id', $productId)->first();

    if(!$productRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = ProductValidator::rules($request, $language, 'existing', $productId, $properties);
    $messages = ProductValidator::messages($request, $properties);

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $productRecord->admin_id = $adminId;

        $productRecord->name = $this->getNameObject($validatedData);
        $productRecord->description = $this->getDescriptionObject($validatedData);
        $productRecord->image = $this->getImageObject($validatedData);
        $productRecord->text = $this->getTextObject($validatedData);
        $productRecord->features = $this->getFeaturesObject($validatedData);
        $productRecord->properties = $this->getPropertyObject($validatedData, $properties, $productRecord->properties);

        $productRecord->language = $validatedData['language'];
        $productRecord->status = $validatedData['status'];
        
        $productRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'productList');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function delete(Request $request){

    $productId = $request->recordId ?? '';
    $productRecord = Product::where('id', $productId)->first();

    if(!$productRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $productRecord->delete();
      return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordDeleted', '');
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  protected function getNameObject($data){
    return [
      'en' => $data['nameEn'] ?? '',
      'kr' => $data['nameKr'] ?? ''
    ];
  }

  protected function getDescriptionObject($data){
    return [
      'en' => $data['descriptionEn'] ?? '',
      'kr' => $data['descriptionKr'] ?? ''
    ];
  }

  protected function getImageObject($data){
    return [
      'en' => $data['imageEn'] ?? '',
      'kr' => $data['imageKr'] ?? ''
    ];
  }

  protected function getTextObject($data){
    return [
      'en' => $data['subTextEn'] ?? '',
      'kr' => $data['subTextKr'] ?? ''
    ];
  }
  
  protected function getFeaturesObject($data){
    $featuresEnSet = $data['featuresEnSet'] ?? '';
    $featuresKrSet = $data['featuresKrSet'] ?? '';
    $featuresEnCards = $featuresKrCards = [];

    if( $featuresEnSet ){
      $sectionIndexes = explode(",", $featuresEnSet);
      foreach ($sectionIndexes as $index) {
        $head = $data["featuresEnHeadR$index"] ?? '';
        $text = $data["featuresEnTextR$index"] ?? '';
        $image = $data["featuresEnImageR$index"] ?? '';

        if( $head || $text || $image ){
          $record = [
            "head" => $head,
            "text" => $text,
            "image" => $image
          ];

          array_push($featuresEnCards, $record);
        }
      }
    }

    if( $featuresKrSet ){
      $sectionIndexes = explode(",", $featuresKrSet);
      foreach ($sectionIndexes as $index) {
        $head = $data["featuresKrHeadR$index"] ?? '';
        $text = $data["featuresKrTextR$index"] ?? '';
        $image = $data["featuresKrImageR$index"] ?? '';

        if( $head || $text || $image ){
          $record = [
            "head" => $head,
            "text" => $text,
            "image" => $image
          ];

          array_push($featuresKrCards, $record);
        }
      }
    }

    return [
      'en' => $featuresEnCards,
      'kr' => $featuresKrCards
    ];
  }

  protected function getPropertyObject($data, $properties, $existing){
    $records = isset($existing) && count($existing) > 0 ? $existing : [];

    if( isset($properties) && count($properties) > 0 ){
      foreach( $properties as $p ){
        $temp = [
          "en" => $data["{$p->code}En"] ?? '',
          "kr" => $data["{$p->code}Kr"] ?? ''
        ];

        $records[$p->code] = $temp;
      }
    }

    return $records;
  }
}