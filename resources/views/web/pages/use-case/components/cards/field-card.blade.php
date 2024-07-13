@if ( isset($image) || isset($head) )
  
@endif
<div class="col animateThis fadeGrow">
  <div class="fieldBox">
    @include('web.pages.partials.image', [
      'imageUrl' => $image,
      'caption' => $head
    ])

    <h5>{{ $head ?? '' }}</h5>
  </div>
</div>