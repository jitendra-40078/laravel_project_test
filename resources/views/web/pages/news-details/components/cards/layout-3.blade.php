@if ( isset($image) && $image )
<div class="col-lg-6">
  <div class="newsImageWrp newsImageSubWrp">
  
    <div class="newsPic">
      @include('web.pages.partials.image', [
        'imageUrl' => $image,
        'caption' => $caption ?? ''
      ])
    </div>
  
    @if ( isset($caption) && $caption )
    <span>{{ $caption ?? '' }}</span>  
    @endif
  
  </div>
</div>
@endif