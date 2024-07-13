@if ( isset($image) && $image )
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="newsImageWrp newsImageSubWrp">
    
      <a href="{{ asset($image) }}" data-fancybox="" class="d-block newsPic">
        {{-- @include('web.pages.partials.image', [
          'imageUrl' => $image,
          'caption' => $caption ?? ''
        ]) --}}

        <img src="{{ asset($image) }}" alt="{{ $caption ?? '' }}" /> 
      </a>
    
      @if ( isset($caption) && $caption )
      <span>{{ $caption ?? '' }}</span>  
      @endif
    
    </div>
  </div>
</div>
@endif