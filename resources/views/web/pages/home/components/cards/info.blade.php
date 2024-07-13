@if ( isset($image) || isset($head) || isset($description) )
<div class="swiper-slide">
  <div class="serviceBox">
    <div class="servicePic">
      @if (isset($image) && $image)
      <img
        src="{{ asset($image) }}"
        alt="{{ $head ?? '' }}" />
      @endif
    </div>
    <div class="serviceTitle">
      <h5>{{ $head ?? '' }}</h5>
      {!! $description ?? '' !!}
    </div>
  </div>
</div>
@endif