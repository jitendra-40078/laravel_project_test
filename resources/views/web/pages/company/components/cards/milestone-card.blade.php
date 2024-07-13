@if ( isset($data) || isset($locale) )
<div class="swiper-slide hide" data-fillter="{{ $data['year'] ?? '' }}">
  <span>{{ $data['year'] ?? '' }}.{{ $data['month'] ?? ''}}</span>

  {!! $data['content'][$locale] ?? '' !!}
</div>
@endif