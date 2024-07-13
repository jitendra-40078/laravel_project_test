@if (isset($data) && isset($locale))
<div class="swiper-slide">
  <div class="testimonialBox">
    <div class="testimonialPic">
      
      @if (isset($data['image']) && isset($data['image'][$locale]) && $data['image'][$locale] )
      @include('web.pages.partials.image', [
        'imageUrl' => $data['image'][$locale],
        'caption' => $data['title'][$locale] ?? ''
      ])
      @endif
      
    </div>
    <span class="year">{{ $data['year'] ?? '' }}</span>
    <h4>{{ $data['title'][$locale] ?? '' }}</h4>
    <p>{{ $data['content'][$locale] ?? '' }}</p>
  </div>
</div>
@endif