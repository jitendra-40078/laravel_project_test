@if (isset($section5Data) || isset($testimonials) )
<section class="mb-5">
  <div class="container py-lg-5">
    <div class="row justify-content-between">
      <div class="col-lg-3 animateThis slideRight testimonialIntro">
        <div class="text-start title">
          <h2><span>{{ $section5Data['heading'] ?? '' }}</span></h2>
          <p>{!! nl2br($section5Data['subHeading'] ?? '') !!}</p>

          <a href="{{ route('web.useCasePage') }}" class="ctaBtn d-table mt-3 mt-lg-5">{{ $section5Data['btnText'] ?? 'View More' }}</a>   
          
        </div>
      </div>

      @if (isset($testimonials) && !empty($testimonials))
      <div class="col-lg-8 animateThis slideLeft">
        <div class="swiper testimonialSwiper">
          <div class="swiper-wrapper">

            @foreach ($testimonials as $testimonial)
            
              @include('web.pages.home.components.cards.testimonial', [
                "data" => $testimonial,
                "locale" => $locale
              ])
            @endforeach
          
          </div>
          <div class="test-swiper-pagination swiper-pagination"></div>
        </div>
      </div>
      @endif

    </div>
  </div>
</section>
@endif