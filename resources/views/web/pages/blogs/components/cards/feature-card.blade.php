@if ( isset($slug) || isset($title) || isset($category) || isset($image) || isset($publish_date) )
<div class="swiper-slide">
  <a href="{{ route('web.blogsDetailsPage', $slug) }}" class="latestTrend mb-lg-0 mb-5">
    
    <div class="ltImage">
      @include('web.pages.partials.image', [
        'imageUrl' => $image[$locale ?? 'en'] ?? '',
        'caption' => $title[$locale ?? 'en'] ?? ''
      ])
    </div>

    <div class="ltText">
      <h6>{{ $locale === 'en' ? ( $category['nameEn'] ?? '' ) : ( $category['nameKr'] ?? '' ) }}</h6>
      <h5>{{ $title[$locale ?? 'en'] ?? '' }}</h5>
      <span>{{ $publish_date ? date('F d, Y', strtotime($publish_date)) : '' }}</span>
    </div>
  </a>
</div>
@endif