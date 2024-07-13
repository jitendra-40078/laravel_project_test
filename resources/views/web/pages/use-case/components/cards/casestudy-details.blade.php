@if ( isset($data) || isset($index) || $isset($locale) )
<div class="tab-pane fade {{ isset($index) && $index === 1 ? 'active show' : '' }}" id="casestudy-{{ $index }}-pane">
  <div class="caseDetailBox">

    <div class="casePicture">

      <div class="caseMainImg">
        @if (isset($data['image']) && isset($data['image'][$locale]) && $data['image'][$locale] )
          @include('web.pages.partials.image', [
            'imageUrl' => $data['image'][$locale],
            'caption' => $data['title'][$locale] ?? ''
          ])
        @endif
      </div>

      <div class="caseLogo">
        @if (isset($data['logo']) && isset($data['logo'][$locale]) && $data['logo'][$locale] )
          @include('web.pages.partials.image', [
            'imageUrl' => $data['logo'][$locale],
            'caption' => $data['title'][$locale] ?? ''
          ])
        @endif
      </div>

    </div>

    <h4>{{ $data['title'][$locale] ?? '' }}</h4>
    <p>{{ $data['content'][$locale] ?? '' }}</p>

    @if (isset($data['report']) && isset($data['report'][$locale]) && $data['report'][$locale] )
      <a
        href="{{ $data['report'][$locale] }}"
        target="_blank"
        class="arwCta">Learn More</a>
    @endif

  </div>
</div>
@endif