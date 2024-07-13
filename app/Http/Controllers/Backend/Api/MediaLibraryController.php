<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Http\Controllers\Backend\Api\Validators\MediaLibrary\Group as GroupValidator;
use App\Http\Controllers\Backend\Api\Validators\MediaLibrary\File as FileValidator;
use App\Utility\ApiResponse;

use App\Models\MediaLibraryGroup;
use App\Models\MediaLibrary;

class MediaLibraryController extends Controller
{
  public function groupCreate(Request $request){

    $rules = GroupValidator::rules('new', null);
    $messages = GroupValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $newRecord = new MediaLibraryGroup();
        $newRecord->admin_id = $adminId;
        $newRecord->name = $validatedData['name'];
        $newRecord->status = 'A';
        
        $newRecord->save();
    
        return ApiResponse::alert(201, 'alertSuccessReload', 'Success', 'success', 'recordAdded', '');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function groupUpdate(Request $request){

    $groupId = $request->id ?? '';
    $groupRecord = MediaLibraryGroup::where('id', $groupId)->first();

    if(!$groupRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    $rules = GroupValidator::rules('existing', $groupId);
    $messages = GroupValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{
      $validatedData = $validator->validated();

      if (Auth::guard('admin')->check()) {
        $adminId = Auth::guard('admin')->id();
    
        $groupRecord->name = $validatedData['name'];
        $groupRecord->status = $validatedData['status'];
        $groupRecord->admin_id = $adminId;
        
        $groupRecord->save();
    
        return ApiResponse::alert(200, 'alertSuccessRedirect', 'Success', 'success', 'recordUpdated', 'mediaLibraryGroupList');
      }else{
        return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
      }
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function groupDelete(Request $request){

    $groupId = $request->recordId ?? '';
    $groupRecord = MediaLibraryGroup::where('id', $groupId)->first();

    if(!$groupRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{
      $groupRecord->delete();
      return ApiResponse::alert(200, 'alertSuccessReload', 'Success', 'success', 'recordDeleted', '');
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function fileUpload(Request $request){

    $rules = FileValidator::rules();
    $messages = FileValidator::messages();

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return ApiResponse::validateError($validator->errors());
    }

    try{

      $validatedData = $validator->validated();
      $file = $validatedData['media'];

      // meta information
      $originalName = $file->getClientOriginalName();
      $mimeType = $file->getClientMimeType();
      $size = $file->getSize();
      $imageDetails = null;

      if( in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp', 'image/tiff']) ){
        $imageDetails = $this->getImageDetails($file);
      }

      $date = Carbon::now();
      $folderPath = 'uploads/' . $date->format('Y/m/d');

      if (!is_dir($folderPath)) {
        mkdir($folderPath, 0755, true); // Create the directory if it does not exist
      }

      $sanitizedName = $this->sanitizeFileName($originalName);
      $path = $folderPath . '/' . $sanitizedName;

      if (Auth::guard('admin')->check()) {

        // Move the file to the new directory
        $isUploaded = $file->move(public_path($folderPath), $sanitizedName);

        $newRecord = new MediaLibrary();

        $newRecord->admin_id = Auth::guard('admin')->id();
        $newRecord->media_library_group_id = $validatedData['mediaGroupId'] ?? null;

        $newRecord->name = $originalName;
        $newRecord->objectKey = $sanitizedName;
        $newRecord->path = $path;
        $newRecord->type = $mimeType;
        $newRecord->size = $size;
        $newRecord->height = $imageDetails && $imageDetails['height'] ? $imageDetails['height'] : null;
        $newRecord->width = $imageDetails && $imageDetails['width'] ? $imageDetails['width'] : null;

        $newRecord->meta = [
          "originalName" => $originalName,
          "mime" => $mimeType,
          "size" => $size,
          'height' => $imageDetails && $imageDetails['height'] ? $imageDetails['height'] : null,
          'width' => $imageDetails && $imageDetails['width'] ? $imageDetails['width'] : null,
          'path' => $path,
          'name' => $sanitizedName
        ];

        $newRecord->year = $date->format('Y');
        $newRecord->status = 'A';

        $newRecord->save();
    
        return ApiResponse::send(201, 'success', '', null);
      }else{
        $this->removeFile($path);
        return ApiResponse::send(422, 'failed', '', null);
      }
    }
    catch(\Exception $e){
      $this->removeFile($path);
      
      dd($e);
      return ApiResponse::send(422, 'failed', '', null);
    }
  }

  public function fileDelete(Request $request){

    $mediaId = $request->mediaId ?? '';
    $mediaRecord = MediaLibrary::where('code', $mediaId)->first();

    if(!$mediaRecord){
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }

    try{

      if( $mediaRecord->path ){
        $this->removeFile($mediaRecord->path);
      }

      $mediaRecord->delete();
      return ApiResponse::send(200, 'success', '', null);
    }
    catch(\Exception $e){
      dd($e);
      return ApiResponse::alert(422, 'alert', 'Failure', 'error', 'somethingWrong', '');
    }
  }

  public function fetchMedia(Request $request){
    
    $page = $request->query('page', 1);
    $group = $request->query('group');
    $year = $request->query('year');
    $search = $request->query('search');

    $query = MediaLibrary::query();

    $query->select('code', 'meta');

    if ($group) {
      $query->where('media_library_group_id', $group);
    }

    if ($year) {
      $query->where('year', $year);
    }

    if ($search) {
      $query->where('name', 'like', "%{$search}%");
    }

    $query->orderBy('created_at', 'desc');
    $mediaItems = $query->paginate(20, ['*'], 'page', $page);

    if( $mediaItems ){
      return ApiResponse::send(200, 'success', 'records found', $mediaItems);
    }else{
      return ApiResponse::send(200, 'failed', 'no records found', []);
    }
  }

  protected function getImageDetails($file){
    try {
      $manager = new ImageManager(new Driver());
      $image = $manager->read($file);

      return [
        'width' => $image->width(),
        'height' => $image->height(),
      ];
    } catch (\Exception $e) {
      return [
        'width' => null,
        'height' => null,
        'error' => $e->getMessage(),
      ];
    }
  }

  protected function sanitizeFileName($filename){
    // Remove spaces and replace with hyphens
    $nameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    // Use Laravel's Str::slug method or str_replace for basic replacement
    $slug = Str::slug($nameWithoutExtension).'_'.uniqid().'.'.$extension;

    return $slug;
  }

  protected function removeFile($path){
    try {
      if (isset($path) && file_exists(public_path($path))) {
        unlink(public_path($path));
      }
    } catch (\Exception $e) {
      dd($e);
    }

    return;
  }
}