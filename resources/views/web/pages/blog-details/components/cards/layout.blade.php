@if ( isset($content) && isset($content[$locale]) && is_array($content[$locale]) && count($content[$locale]) > 0 )
@foreach ($content[$locale] as $element)
@switch($element['layout'])
  @case('layout_1')
    @include('web.pages.blog-details.components.cards.layout-1', $element)
    @break
  @case('layout_2')
    @include('web.pages.blog-details.components.cards.layout-2', $element)
    @break
  @case('layout_3')
    @include('web.pages.blog-details.components.cards.layout-3', $element)
    @break
@endswitch
@endforeach
@endif