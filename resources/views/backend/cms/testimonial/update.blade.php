@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">

  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
    <div class="breadcrumb-title pe-3">CMS</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('cms.testimonial.list') }}">Testimonials</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Update Testimonial
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="card">
        <form id="testimonialUpdateForm">

          <div class="card-header py-3 bg-transparent">
            <div class="d-sm-flex align-items-center">
              <h5 class="mb-2 mb-sm-0">UPDATE TESTIMONIAL</h5>
            </div>
          </div>
          
          <div class="card-body">

            @include('backend.partials.inputs.hidden', [
              'inputId' => 'id',
              'value' => $testimonialData->id ?? ''
            ])

            @include('backend.cms.testimonial.components.basic', $testimonialData)

            @include('backend.cms.testimonial.components.english', $testimonialData)
            
            @include('backend.cms.testimonial.components.korean', $testimonialData)

            <div class="row g-3">
              <div class="col-12 col-lg-8">
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>   

</main>
@endsection