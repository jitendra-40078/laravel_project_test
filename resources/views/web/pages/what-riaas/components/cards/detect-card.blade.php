@if ( isset($head) || isset($image) )
<div class="col">
  <div class="fieldBox animateThis fadeGrow">
    @if ( isset($image) && $image )
    <img src="{{ asset($image) }}" alt="{{ $head ?? '' }}" />
    @endif
    <h5>{{ $head ?? '' }}</h5>
  </div>
</div>
@endif