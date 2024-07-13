@if ( isset($heading) || isset($subHeading) || isset($image) )
<section class="mb-5">
  <div class="innerBanner">
    
    <div class="h-100 position-relative innerBannerPic">
      @include('web.pages.partials.image', [
        'imageUrl' => $image,
        'caption' => $heading
      ])
    </div>

    <div class="bannerTxt">
      <h3>{{ $heading ?? '' }}</h3>
      <p>{!! nl2br($subHeading ?? '') !!}</p>
    </div>
    
    <a href="#scrollSection" class="scrollBtn">
      <span></span>
    </a>
  </div>
</section>
@endif