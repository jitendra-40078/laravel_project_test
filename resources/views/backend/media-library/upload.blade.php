@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
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
            Upload Media
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->

  <div class="card bg-violet mediaLibraryUpload">

    <div class="card-header card-title">
      <h6 class="mb-0">UPLOAD MEDIA</h6>
    </div>

    <div class="card-body">

      <div id="mediaForm">
        <form class="row g-3">

          @isset($mediaLibraryGroups)
          @include('backend.partials.inputs.select', [
            'wrapperClass' => 'col-12 col-md-4 roleDropdown',
            'inputLabel' => 'Select Group',
            'inputId' => 'mediaLibraryGroupId',
            'value' => '',
            'inputOptions' => $mediaLibraryGroups 
          ])
          @endisset

          <div class="col-12">
            <div class="dropzone">
              <p class="preview-text">Click here to select files</p>
              <div class="file-previews row g-3"></div>
              <input type="file" class="file-input" id="media" name="media" multiple>
            </div>
            <label for="media" class="invalid-feedback"></label>
          </div>

          <div class="col-12">
            <label class="hint">
              <ul>
                <p>Notes:</p>
                <li>Accepted formats: png, jpg, jpeg, svg, gif, pdf, doc, docx, xls, xlsx, mp4, mp3</li>
                <li>File size : upto 100mb</li>
                <li>Maximum number of files allowed : 10</li>
              </ul>
            </label>
          </div>
          
          <div class="col-12">
            <button type="button" id="uploadMedia" class="btn btn-primary px-4">Upload</button>
          </div>

        </form>
      </div>

      <div class="row g-3 uploaded-files" id="mediaUpload">
        <div class="col-12 mb-4">
          <a href="{{ route('cms.medialibrary.list') }}" class="btn btn-primary px-4">Back to library</a>
          <a href="{{ route('cms.medialibrary.upload') }}" class="btn btn-primary px-4">Upload more</a>
        </div>
      </div>

    </div>
  </div>
</main>
@endsection