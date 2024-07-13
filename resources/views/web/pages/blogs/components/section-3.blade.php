<section class="mb-5">
  <div class="container">
    <div class="row gx-lg-5">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="blogListingTitle">
          <div class="col-auto"><h4>{{ $latest ?? '' }}</h4></div>
          <div class="col"><span></span></div>
        </div>

        <ul class="row mb-4 mb-lg-5 blogListing articleListing">

        </ul>

        <button type="button" id="loadMoreRecord" class="ctaBtn mx-auto borderBtn">{{ $btnText ?? 'Load More' }}</button>
      </div>

      @if ( isset($popularBlogs) && count($popularBlogs) > 0 )
      <div class="col-lg-4" data-sticky_parent>
        <div class="sticky" data-sticky_column>
          <div class="blogListingTitle">
            <div class="col-auto"><h4>{{ $popular ?? '' }}</h4></div>
            <div class="col"><span></span></div>
          </div>

          <ul class="row blogListing">
            @foreach ($popularBlogs as $t)
              @include('web.pages.blogs.components.cards.trending-card', $t)
            @endforeach
          </ul>
        </div>
      </div>
      @endif

    </div>
  </div>
</section>