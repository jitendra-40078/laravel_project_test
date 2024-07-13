@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">
  
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
    <div class="breadcrumb-title pe-3">Pages</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('cms.page.list') }}">Pages</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Update {{ $pageData && $pageData->name ? $pageData->name : '' }} Page
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->

  @if ($pageData)
  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="card">
        <form id="pageUpdateForm">

          <div class="card-header py-3 bg-transparent">
            <div class="d-sm-flex align-items-center">
              <h5 class="mb-2 mb-sm-0">UPDATE {{ strtoupper($pageData->name) }} PAGE</h5>
              <div class="ms-auto">
                <button type="submit" class="btn btn-success">Save Details</button>
              </div>
            </div>
          </div>
          
          <div class="card-body">

            @include('backend.partials.inputs.hidden', [
              'inputId' => 'code',
              'value' => $pageData->code
            ])

            @include('backend.partials.inputs.hidden', [
              'inputId' => 'template',
              'value' => $pageData->template
            ])
       
            {{--  PAGE INFORMATION --}}
            @include('backend.page.shared.info', [
              'name' => $pageData->name,
              'language' => $pageData->lang
            ])
        
            {{--  SEO --}}
            @include('backend.page.shared.seo', $pageData->seo)

            @if ( $pageData->template )
            @include('backend.page.components.'.$pageData->template.'.template', $pageData->content)
            @endif

            <div class="row g-3">
              <div class="col-12 col-lg-8">
                <button type="submit" class="btn btn-success">Save Details</button>
              </div>
            </div>
            
            <!--end row-->
          </div>
        </form>
      </div>
    </div>
  </div>
  @endif
</main>

@endsection