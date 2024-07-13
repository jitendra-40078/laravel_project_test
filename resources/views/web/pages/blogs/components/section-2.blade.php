@if ( isset($similarBlogs) && count($similarBlogs) > 0 )
<section class="mb-5">
  <div class="container">
    <div class="swiper serviceSwiper">
      <div class="swiper-wrapper">
        @foreach ($similarBlogs as $t)
          @include('web.pages.blogs.components.cards.feature-card', $t)
        @endforeach
      </div>

      <div class="swiper-pagination service-swiper-pagination"></div>
    </div>
  </div>
</section>
@endif