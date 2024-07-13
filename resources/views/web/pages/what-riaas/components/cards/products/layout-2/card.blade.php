@if ( isset($name) || isset($text) || isset($image) || isset($description) )
<div class="swiper-slide">
  <div
    class="productBox"
    data-bs-toggle="modal"
    data-bs-target="#{{ $code }}"
  >
    <div class="productBoxInner">

      <div class="productDetails">
        <h4>{{ $name[$locale ?? 'en'] ?? '' }} <span>{{ $text[$locale ?? 'en'] ?? '' }}</span></h4>
      </div>
      
      <div class="productImg">
        @include('web.pages.partials.image', [
          'imageUrl' => $image[$locale ?? 'en'] ?? '',
          'caption' => $name[$locale ?? 'en'] ?? ''
        ])
      </div>
    </div>
  </div>
</div>
@endif