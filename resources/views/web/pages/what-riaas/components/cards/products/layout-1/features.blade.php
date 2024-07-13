@if ( isset($features[$locale ?? 'en']) && count($features[$locale ?? 'en']) > 0 )
<div
  class="g-4 px-xl-5 row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 mb-lg-5 mb-4 text-center justify-content-center aiIcons">

  @foreach ($features[$locale ?? 'en'] as $f)
    @include('web.pages.what-riaas.components.cards.products.feature-card', $f)
  @endforeach
  
</div>
@endif