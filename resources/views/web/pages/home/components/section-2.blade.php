@if ( isset($cards) || isset($headingRed) || isset($heading) )
<section class="mb-5">
  <div class="container py-lg-5">
    <div class="title animateThis slideTop">
      <h2><span>{{ $headingRed ?? '' }}</span> {{ $heading ?? ''}}</h2>
      <p>{!! nl2br($subHeading ?? '') !!}</p>
    </div>

    @if (isset($cards) && is_array($cards) && !empty($cards))
    <div class="swiper serviceSwiper">
      <div class="swiper-wrapper">
        @foreach ($cards as $card)
          @include('web.pages.home.components.cards.info', $card)
        @endforeach
      </div>
      <div class="swiper-pagination service-swiper-pagination"></div>
    </div>
    @endif

  </div>
</section>
@endif