@if ( isset($content) && isset($content[$locale]) && is_array($content[$locale]) && count($content[$locale]) > 0 )
<div class="col-lg-8">

  <div class="row justify-content-center">
    @foreach ($content[$locale] as $element)
      @switch($element['layout'])
        @case('layout_1')
          @include('web.pages.news-details.components.cards.layout-1', $element)
          @break
        @case('layout_2')
          @include('web.pages.news-details.components.cards.layout-2', $element)
          @break
        @case('layout_3')
          @include('web.pages.news-details.components.cards.layout-3', $element)
          @break
      @endswitch
    @endforeach
  </div>

  <div class="shareArticle d-flex justify-content-center align-items-center">
    <span>Share article:</span>
    <div class="sharethis-inline-share-buttons"></div>
  </div>
  
</div>
@endif