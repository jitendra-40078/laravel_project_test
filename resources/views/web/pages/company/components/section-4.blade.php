@if ( isset($leadershipData) && count($leadershipData) > 0 )
<section class="mb-5">
  <div class="container animateThis slideTop">
    <div class="title">
      <h2>{{ $heading ?? '' }}</h2>
    </div>

    @if (isset($leadershipData) && !empty($leadershipData))
    <div class="swiper leadershipSwiper">
      <div class="row swiper-wrapper flex-nowrap flex-md-wrap mx-0">
        @foreach ($leadershipData as $leadership)
          @include('web.pages.company.components.cards.leadership-card', [
            'locale' => $locale ?? 'en',
            'data' => $leadership
          ])  
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
    @endif

  </div>
</section>
@endif