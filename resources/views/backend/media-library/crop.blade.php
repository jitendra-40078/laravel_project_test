@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<style>

</style>

<main class="page-content">

  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
    <div class="breadcrumb-title pe-3">Media Library</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('cms.medialibrary.list') }}">Media Library</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Crop Media
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->

  <div class="card bg-violet">

    <div class="card-header card-title">
      <h6 class="mb-0">CROP MEDIA</h6>
    </div>

    <div class="card-body">

      <div class="row g-3">

        <input type="hidden" name="mediaGroupId" id="mediaGroupId" value="{{ $mediaFile->media_library_group_id  }}">

        <input type="hidden" name="mediaFileName" id="mediaFileName" value="{{ $mediaFile->name  }}">

        <input type="hidden" name="mediaFileType" id="mediaFileType" value="{{ $mediaFile->type  }}">

        <div class="col-12 col-md-6">
          <img 
            id="cropImageContainer" 
            src="/{{ $mediaFile->path }}" 
            style="max-width: 50%; height: auto;">
        </div>  
          
        <div class="col-12">
          <button type="button" class="btn btn-primary px-4" onclick="cropImage()">Crop</button>
          <a href="{{ route('cms.medialibrary.list') }}" class="btn btn-primary px-4">Back to library</a>
        </div>

      </div>

    </div>
  </div>
</main>
@endsection