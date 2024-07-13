@if ( isset($data) || isset($index) || $isset($locale) )
<li
  class="{{ isset($index) && $index === 1 ? 'active' : '' }}"
  id="casestudy-tab-{{ $index }}"
  data-bs-toggle="tab"
  data-bs-target="#casestudy-{{ $index }}-pane"
  >
  <div class="d-flex align-items-center">
    <div class="col-auto me-3">
      <div class="caseLogo">
        @if (isset($data['logo']) && isset($data['logo'][$locale]) && $data['logo'][$locale] )
          @include('web.pages.partials.image', [
            'imageUrl' => $data['logo'][$locale],
            'caption' => $data['title'][$locale] ?? ''
          ])
        @endif
      </div>
    </div>
    <div class="col">
      <h6>{{ $data['title'][$locale] ?? '' }}</h6>
      <span>{{ $data['duration'] ?? '' }}</span>
    </div>
  </div>
</li>
@endif