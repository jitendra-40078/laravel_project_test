<div class="my-4 swiper productSwiper">
  <div class="swiper-wrapper">
    @foreach ($products as $p)
      @include('web.pages.what-riaas.components.cards.products.layout-1.card', $p)
    @endforeach
  </div>
</div>

<div>
  @foreach ($products as $p)
    @include('web.pages.what-riaas.components.cards.products.layout-1.features', $p)
  @endforeach
</div>