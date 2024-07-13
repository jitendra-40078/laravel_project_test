@if ( isset($heading) || isset($subHeading) || isset($cards) )
<section class="mb-5">
  <div class="monitoringWrp">
    <div class="monitoringDetails">
      <div class="container">
        <div class="row animateThis slideLeft">
          <div class="col-lg-6">
            <div class="title text-start">
              <h2>{{ $heading ?? '' }}</h2>
              <p>{!! nl2br($subHeading ?? '') !!}</p>
              {{-- <p>{{ $subHeading ?? '' }}</p> --}}
            </div>
          </div>
          <div class="mon-swiper-pagination"></div>
        </div>
      </div>
    </div>

    @if ( isset($cards) && is_array($cards) && !empty($cards) )
    <div class="swiper monitoringSwiper">
      <div class="swiper-wrapper">
        @foreach ($cards as $card)
          @include('web.pages.what-riaas.components.cards.slider-card', $card)
        @endforeach
      </div>
    </div>
    @endif

  </div>
</section>
@endif