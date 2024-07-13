<div class="mb-4 mt-4 mb-lg-5 swiper productSwiperMulti">
  <div class="swiper-wrapper">

    @foreach ($products as $p)
      @include('web.pages.what-riaas.components.cards.products.layout-2.card', $p)
    @endforeach

  </div>

  <div class="swiper-button-prev product-swiper-button-prev"></div>
  <div class="swiper-button-next product-swiper-button-next"></div>
  
</div>

@foreach ($products as $p)
  @include('web.pages.what-riaas.components.cards.products.layout-2.modal', $p)
@endforeach