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
          <li class="breadcrumb-item active" aria-current="page">
            Media Library
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->

  <div class="card galleryContainer">
    <div class="card-header py-3">
      <div class="row g-3 align-items-center">

        <div class="col-lg-3 col-12 me-auto">
          <a href="{{ route('cms.medialibrary.upload') }}" class="btn btn-primary mb-3 mb-lg-0">
            <i class="bi bi-plus-square-fill me-2"></i>Upload Media
          </a>
        </div>

        <div class="col-lg-3 col-12">
          <div class="ms-auto position-relative">
            <div
              class="position-absolute top-50 translate-middle-y search-icon px-3"
            >
              <i class="bi bi-search"></i>
            </div>

            <input
              class="form-control ps-5"
              type="text"
              id="mediaLibrarySearch"
              placeholder="search" />
          </div>
        </div>

        @isset($mediaLibraryGroups)
        @include('backend.partials.inputs.select', [
          'wrapperClass' => 'col-lg-2 col-12',
          'inputLabel' => '',
          'inputId' => 'mediaLibraryGroup',
          'value' => '',
          'placeholder' => 'Select Group',
          'inputOptions' => $mediaLibraryGroups 
        ])
        @endisset

        @isset($mediaLibraryYears)
          @include('backend.partials.inputs.select', [
            'wrapperClass' => 'col-lg-2 col-12',
            'inputLabel' => '',
            'inputId' => 'mediaLibraryYear',
            'value' => '',
            'placeholder' => 'Select Years',
            'inputOptions' => $mediaLibraryYears
          ])
        @endisset

        <div class="col-lg-2 col-12">
          <button class="btn btn-primary col-12" id="resetFilter">Reset</button>
        </div>

      </div>
    </div>

    <div class="card-body">
      <div class="product-grid">
        <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3 galleryCards">

        </div>      
      </div>

      <nav class="mt-4 me-auto" aria-label="Page navigation">
        <button type="button" class="btn btn-primary mb-3 mb-lg-0" id="loadMoreRecord">Load more</button>
      </nav>

    </div>

  </div>
</main>
@endsection