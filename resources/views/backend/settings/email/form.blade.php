@extends('backend.template.dashboard.dashboard')

@section('dashboardContent')
<main class="page-content">

  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
    <div class="breadcrumb-title pe-3">Settings</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item">
            <a href="{{ route('cms.account.dashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Update Settings
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 mx-auto">

      @if ( Auth::guard('admin')->check() && Auth::guard('admin')->user()->type === 'SA' )
        @if ( isset($smtp) && $smtp )
          @include('backend.settings.email.components.smtp', $smtp)
        @endif
      @endif
      
      @if ( isset($careerMailSetting) && $careerMailSetting )
        @include('backend.settings.email.components.career-mail', $careerMailSetting)
      @endif

      @if ( isset($contactMailSetting) && $contactMailSetting )
        @include('backend.settings.email.components.contact-mail', $contactMailSetting)
      @endif

    </div>
  </div>   

</main>
@endsection