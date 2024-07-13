@if ( isset($head) || isset($image) || isset($cards) ) 
<div class="row gx-lg-5 align-items-center endRow">

  <div class="col-lg-6 mb-4 mb-lg-0 servicePicWrp">
    <div class="servicePic animateThis fadeGrow">
      @include('web.pages.partials.image', [
        'imageUrl' => $image ?? '',
        'caption' => $head ?? ''
      ])
    </div>
  </div>

  <div class="col-lg-5 mb-4 endServiceTxt animateThis slideRight">
    <h4>{{ $head ?? '' }}</h4>
    @if (isset($cards) && is_array($cards) && !empty($cards))
    <ul>
      @foreach ($cards as $card)
        @if (isset($card['text']) || isset($card['icon']))
        <li>
          <div class="col-auto endServiceIcon">
            @include('web.pages.partials.image', [
              'imageUrl' => $card['icon'] ?? '',
              'caption' => $card['text'] ?? ''
            ])
          </div>
          
          <div class="col">{{ $card['text'] ?? '' }}</div>
        </li>
        @endif
      @endforeach
    </ul>
    @endif

  </div>
</div>
@endif