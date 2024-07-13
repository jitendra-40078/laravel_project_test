<section class="mt-5 mb-5">
  <div class="container">
    <div class="row gx-lg-5">

      @if ( isset($latestBlog) )
      <div class="col-lg-8 mb-5">
        <a href="{{ route('web.blogsDetailsPage', $latestBlog->slug ?? '' ) }}" class="latestTrend blogMainBox">

          <div class="ltImage">
            @include('web.pages.partials.image', [
              'imageUrl' => $latestBlog->image[$locale ?? 'en'],
              'caption' => $latestBlog->title[$locale ?? 'en']
            ])
          </div>

          <div class="ltText">
            <h6>{{ $locale === 'en' ? ($latestBlog->category->nameEn) : ($latestBlog->category->nameKr) }}</h6>
            <h5>{{ $latestBlog->title[$locale ?? 'en'] ?? '' }}</h5>
            <h6>{{ $latestBlog->publish_date ? date("F d, Y",strtotime($latestBlog->publish_date)) : '' }}</h6>
          </div>
        </a>
      </div>
      @endif

      @if ( isset($trendingBlogs) && count($trendingBlogs) > 0 )
      <div class="col-lg-4">
        <div class="blogListingTitle">
          <div class="col-auto"><h4>{{ $trending ?? '' }}</h4></div>
          <div class="col"><span></span></div>
        </div>
        <ul class="row blogListing">
          @foreach ($trendingBlogs as $t)
            @include('web.pages.blogs.components.cards.trending-card', $t)
          @endforeach
        </ul>
      </div> 
      @endif

    </div>
  </div>
</section>