<section class="mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="careerTitle text-center mb-5">
          <h4>{{ $data['heading'] ?? '' }} <span>{{ $data['headingRed'] ?? '' }}</span></h4>
        </div>
      </div>
    </div>
  </div>

  @if ( isset($jobs) && count($jobs) > 0 )
  <div class="row g-4 mb-4 mx-5">
    @foreach ($jobs as $j)
      @include('web.pages.career.components.cards.job-post', $j)
    @endforeach
  </div>

  @include('web.pages.career.components.cards.job-form')
  
  @endif
  
</section>

@if ( isset($data['description']) && $data['description'] )
<section class="mb-5">
  <div class="container resumeNote">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        {{-- <p class="text-center py-5">If you cannot find the desired position, please share your resume with
        us on <a href="mailto:careers@dareesoft.com" class="mailID">careers@dareesoft.com</a> to
        apply.</p> --}}

        {!! $data['description'] !!}
      </div>
    </div>
  </div>
</section> 
@endif