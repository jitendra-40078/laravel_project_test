@if ( isset($image) || isset($title) || isset($type) || isset($short_description) || isset($slug) )
<div class="swiper-slide">
  <a href="{{ route('web.newsDetails', $slug) }}" class="newsBox">
    <div class="newsPic">
      @include('web.pages.partials.image', [
        'imageUrl' => $image[ $locale ?? 'en' ] ?? '',
        'caption' => $title[ $locale ?? 'en' ] ?? ''
      ])
    </div>
    <div class="newsContent">
      <span>{{ $type ? ucfirst($type) : '' }}</span>
      <h4>{{ $short_description[ $locale ?? 'en' ] ?? '' }}</h4>
    </div>
  </a>
</div>
@endif