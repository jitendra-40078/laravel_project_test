@if ( isset($image) || isset($heading) || isset($headingRed) || isset($subHeading) || isset($cards) )
<section class="mb-5" id="scrollSection">
  <div class="py-lg-5 container">
    <div class="row gx-lg-5">
      <div class="col-lg-4" data-sticky_parent>
        <div class="sticky" data-sticky_column>
          <div class="animateThis slideRight">
            <div class="title text-start">
              <h2><span>{{ $headingRed ?? '' }}</span> {{ $heading ?? '' }}</h2>
              <p>{!! nl2br($subHeading ?? '') !!}</p>
              {{-- <p>{{ $subHeading ?? '' }}</p> --}}

              <div class="fouPic">
                @include('web.pages.partials.image', [
                  'imageUrl' => $image,
                  'caption' => "RiaaS"
                ])
                <div class="fouCircle">RiaaS</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        @if (isset($cards) && is_array($cards) && !empty($cards))
        <div class="row g-4 row-cols-2">
          @foreach ($cards as $card)
            @include('web.pages.use-case.components.cards.field-card', $card)
          @endforeach
        </div>
        @endif
      </div>

    </div>
  </div>
</section>
@endif