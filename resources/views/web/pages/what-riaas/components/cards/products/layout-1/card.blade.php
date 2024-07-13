@if ( isset($name) || isset($text) || isset($image) || isset($description) )
<div class="swiper-slide">
  <div class="productBox">
    <div class="productBoxInner">
      <div class="productImg">
        @include('web.pages.partials.image', [
          'imageUrl' => $image[$locale ?? 'en'] ?? '',
          'caption' => $name[$locale ?? 'en'] ?? ''
        ])
      </div>
      <div class="productDetails">
        <h4>{{ $name[$locale ?? 'en'] ?? '' }} <span>{{ $text[$locale ?? 'en'] ?? '' }}</span></h4>
        {!! $description[$locale ?? 'en'] ?? '' !!}
      </div>
    </div>
  </div>
</div>
@endif