@if ( isset($title) || isset($slug) || isset($image) )
  
@endif
<li class="col-md-6 col-lg-12">
  <a href="{{ route('web.blogsDetailsPage', $slug ?? '') }}">
    <div class="row align-items-center">
      <div class="col-auto">
        <div class="blogThumb">
          @include('web.pages.partials.image', [
            'imageUrl' => $image[$locale ?? 'en'] ?? '',
            'caption' => $title[$locale ?? 'en'] ?? ''
          ])
        </div>
      </div>
      <div class="col">{{ $title[$locale ?? 'en'] ?? '' }}</div>
    </div>
  </a>
</li>