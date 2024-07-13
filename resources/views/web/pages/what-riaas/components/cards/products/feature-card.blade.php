@if ( isset($image) || isset($head) || isset($text) )
<div class="col">
  @include('web.pages.partials.image', [
    'imageUrl' => $image ?? '',
    'caption' => $head
  ])

  {{ $head ?? '' }}
  <span>{{ $text ?? '' }}</span>
</div>
@endif