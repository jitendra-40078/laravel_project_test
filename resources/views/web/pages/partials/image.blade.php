@if ( isset($imageUrl) && $imageUrl )
<img src="{{ asset($imageUrl) }}" alt="{{ $caption ?? '' }}" />
@endif