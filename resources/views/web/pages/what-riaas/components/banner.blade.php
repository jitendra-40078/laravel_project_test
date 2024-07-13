@if ( isset($image) || isset($heading) )
<section class="mb-5">
  <div class="innerBanner riaasBanner">
    <div class="container">
      <div class="innerBannerPic">

        @if (isset($image) && $image)
          <img 
            src="{{ asset($image) }}" 
            class="img-fluid animateThis fadeGrow"
            alt="" />
        @endif

        <div class="pluses">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    
    <div class="bannerTxt animateThis slideTop">
      <p>{!! nl2br($heading ?? '') !!}</p>
    </div>

    <a href="#scrollSection" class="scrollBtn">
      <span></span>
    </a>
  </div>
</section>
@endif