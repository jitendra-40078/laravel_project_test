@if ( isset($title) || isset($location) || isset($description) || isset($responsibility) )
<div class="col-lg-4">
  <div class="careerBox">

    <div class="locationText row gx-1 mb-2 d-flex">
      <div class="col-auto locationLogo">
        <img src="{{ asset('web/images/career/location.svg') }}" alt="">
      </div>
      <div class="col-auto place pt-1">
        <h6>{{ $location[$locale ?? 'en'] ?? '' }}</h6>
      </div>
    </div>

    <div class=" col-auto post mb-3">
      <h6>{{ $title[$locale ?? 'en'] ?? '' }}</h6>
    </div>
    
    <div class="col-auto">
      <div class="descriptionDetail mb-4">
        @if ( isset($description[$locale ?? 'en']) && $description[$locale ?? 'en'] )
          @displayShortDescription($description[$locale ?? 'en'] ?? '')
        @endif
      </div>
    </div>
    
    <div class="Twobutton row justify-content-between align-items-center">
      <div class="col-auto">
        <a href="#PostDetails{{ $id ?? '' }}" data-fancybox>{{ __('web.knowMore') }}</a>
        
        <div 
          id="PostDetails{{ $id ?? '' }}" 
          class="popupBox fancybox__content" 
          style="display: none; max-width: 700px; border-radius: 10px;">
          <div class="container">
            <div class="locationText row gx-1 mb-2 d-flex">
              <div class="col-auto locationLogo">
                <a href="#"><img src="{{ asset('web/images/career/location.svg') }}" alt=""></a>
              </div>
              <div class="col-auto place pt-1">
                <h6>{{ $location[$locale ?? 'en'] ?? '' }}</h6>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 post mb-2">
                <h6>{{ $title[$locale ?? 'en'] ?? '' }}</h6>
              </div>
              <div class="col-lg-12 descriptionDetail mb-5">
                <h6>{{ __('web.description') }}:</h6>
                {!! $description[$locale ?? 'en'] ?? '' !!}
              </div>

              <div class="col-lg-12 roles ">
                @if ( isset($responsibility[$locale ?? 'en']) && $responsibility[$locale ?? 'en'] )
                <h5>{{ __('web.roles_resp') }}</h5>
                {!! $responsibility[$locale ?? 'en'] ?? '' !!}
                @endif
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-auto">
                <a 
                  href="#applyJob" 
                  class="ctaBtn applyBtn careerFormPopup" 
                  data-fancybox
                  data-jobid='{{ $id ?? '' }}'
                  data-jobtitle='{{ $title[$locale ?? 'en'] ?? '' }}'>{{ __('web.applyNow') }}</a>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-auto">
        <a 
          href="#applyJob" 
          class="ctaBtn applyBtn careerFormPopup" 
          data-fancybox
          data-jobid='{{ $id ?? '' }}'
          data-jobtitle='{{ $title[$locale ?? 'en'] ?? '' }}'>{{ __('web.applyNow') }}</a>
      </div>
    </div>
  </div>
</div>
@endif