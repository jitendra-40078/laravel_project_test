@if (isset($heading) || isset($subHeading) || isset($cards))
<section class="mb-5" id="scrollSection">
  <div class="py-lg-5 container">
    <div class="row gx-lg-5">
      <div class="col-lg-4" data-sticky_parent>
        <div class="sticky" data-sticky_column>
          <div class="animateThis slideRight">
            <div class="title text-start">
              <h2><span>{{ $heading ?? '' }}</span></h2>
              <p>{!! nl2br($subHeading ?? '') !!}</p>
            </div>
          </div>
        </div>
      </div>

      @if (isset($cards) && is_array($cards) && !empty($cards))
      <div class="col-lg-8 fieldBoxContainer">
        <div
          class="row g-4 row-cols-2 row-cols-md-3 row-cols-lg-2 row-cols-xl-3"
        >
          @foreach ($cards as $card)
            @include('web.pages.what-riaas.components.cards.detect-card', $card)
          @endforeach
        </div>
      </div>  
      @endif

    </div>
  </div>
</section>
@endif