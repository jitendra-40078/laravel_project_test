@if ( isset($data) || isset($featuredNews) )
<section class="mb-5">
  <div class="innerBanner">
    
    <div class="h-100 position-relative innerBannerPic">
      @include('web.pages.partials.image', [
        'imageUrl' => $data['image'] ?? '',
        'caption' => ''
      ])
    </div>

    <div class="ftNewsWrp">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <h3>{{ $data['heading'] ?? '' }}</h3>
            
            @if (isset($featuredNews) && !empty($featuredNews))
            <div class="swiper ftSwiper">
              <div class="swiper-wrapper">
                @foreach ($featuredNews as $fnews)
                  @include('web.pages.news.components.cards.feature-card', $fnews)
                @endforeach
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif