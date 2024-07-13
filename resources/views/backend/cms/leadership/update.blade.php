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
            <a href="{{ route('cms.leadership.list') }}">Leadership</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Update Leadership
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 mx-auto">
      <div class="card">
        <form id="leadershipUpdateForm">

          <div class="card-header py-3 bg-transparent">
            <div class="d-sm-flex align-items-center">
              <h5 class="mb-2 mb-sm-0">UPDATE LEADERSHIP</h5>
            </div>
          </div>
          
          <div class="card-body">

            @include('backend.partials.inputs.hidden', [
              'inputId' => 'id',
              'value' => $leadershipData->id ?? ''
            ])

            @include('backend.cms.leadership.components.basic', $leadershipData)

            @include('backend.cms.leadership.components.english', $leadershipData)
            
            @include('backend.cms.leadership.components.korean', $leadershipData)

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