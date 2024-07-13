@if ( isset($headingRed) || isset($heading) || isset($subHeading) || isset($cards) )
<section class="mb-5 mb-md-0 cpWrp">
  <div class="py-5 platformWrp animateThis slideTop">
    <div class="py-lg-5 container">
      <div class="title text-center">
        <h2><span>{{ $headingRed ?? '' }}</span> {{ $heading ?? '' }}</h2>
        <p>{!! nl2br($subHeading ?? '') !!}</p>
        {{-- <p>{{ $subHeading ?? '' }}</p> --}}
      </div>

      @if (isset($cards) && is_array($cards) && !empty($cards))
      <div class="swiper platformSwiper">
        <div class="swiper-wrapper">
          @foreach ($cards as $card)
            @include('web.pages.what-riaas.components.cards.platform-card', $card)
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
@endif