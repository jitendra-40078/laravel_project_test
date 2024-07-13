<section class="mb-5">
  <div class="bannerWrp">

    @if (isset($image) && $image )
    <div class="bannerVideo">
      {{-- <video autoplay muted loop poster="{{ asset('web/images/videoPoster.jpg') }}"> --}}
        <video autoplay muted loop playsInline>
          <source src="{{ asset($image) }}" />
        </video>
    </div>
    @endif

    <div class="bannerContent d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="drop-in">
          <h1 class="bannerHeading">
            {{ $heading1 ?? '' }}<br />{{ $heading2 ?? '' }}
          </h1>
        </div>
        <div class="drop-in-2 d-none d-md-block">
          <h4>{{ $counterText ?? '' }}</h4>

          @if( isset($hazardData) && $hazardData )
          <div class="bannerHeading m-0">
            <span class="count">{{ $hazardData['count'] ?? '' }}</span>
            <span class="hazardCountText">{{ $hazardData['formatted_count'] ?? '' }}</span>
            {{ $counterUnit ?? '' }}
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="drop-in-2 bannerBtmMob d-md-none">
      <h4>{{ $counterText ?? '' }}</h4>

      @if( isset($hazardData) && $hazardData )
      <div class="bannerHeading m-0">
        <span class="count">{{ $hazardData['count'] ?? '' }}</span>
        <span class="hazardCountText">{{ $hazardData['formatted_count'] ?? '' }}</span>
        {{ $counterUnit ?? '' }}
      </div>
      @endif
    </div>
  </div>
</section>