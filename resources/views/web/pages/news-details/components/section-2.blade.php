@if ( isset($recommend) && count($recommend) > 0 )
<div class="row justify-content-center mb-3">
  <div class="col-lg-8">
    <div class="swiper newsListing newsSwiper">
      <div class="d-flex justify-content-between mb-3">
        <div class="swiper-button-prev">
          <img
            src="{{ asset('web/images/previousArrow.svg') }}"
            alt=""
            class="me-2"
          />Previous
        </div>
        <div class="swiper-button-next">
          Next<img
            src="{{ asset('web/images/nextArrow.svg') }}"
            class="ms-2"
            alt=""
          />
        </div>
      </div>

      <div class="swiper-wrapper">
        @foreach ($recommend as $rnews)
          @include('web.pages.news-details.components.cards.recommend', $rnews)
        @endforeach
      </div>

    </div>
  </div>
</div>
@endif