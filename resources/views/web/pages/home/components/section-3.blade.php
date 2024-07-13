@if (isset($image) || isset($heading) || isset($headingRed) || isset($subHeading) || isset($cards))
<section>
  <div class="py-5 maintainceBg">
    <div class="container py-lg-5">
      <div class="title animateThis slideTop">
        <h2>
          {{ $heading ?? '' }} <span class="d-block">{{ $headingRed ?? '' }}</span>
        </h2>
        <p>{!! nl2br($subHeading ?? '') !!}</p>
      </div>
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-5 mb-4 mb-lg-0 animateThis slideRight">
          @if (isset($image) && $image)
          <img src="{{ asset($image) }}" class="img-fluid" alt="{{ $heading ?? '' }}" />
          @endif
        </div>

        @if (isset($cards) && is_array($cards) && !empty($cards))
        <div class="col-lg-7">
          <ul class="row maintainceList">
            @php
              $cardIndex = 1;
            @endphp
            @foreach ($cards as $card)
              @include('web.pages.home.components.cards.feature', [
                "head" => $card['head'],
                "text" => $card['text'],
                "counter" => $cardIndex
              ])

              @php
                $cardIndex++;
              @endphp
            @endforeach
          </ul>
        </div>
        @endif

      </div>
    </div>
  </div>
</section>
@endif