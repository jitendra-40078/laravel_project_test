<section class="mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="row">

          <div class="col-12 mb-5">
            <ul class="d-flex newsListingBtn">
              <li class="active" data-id="all">
                <button>{{ $labelAll ?? 'All' }}</button>
              </li>
              <li data-id="news">
                <button>{{ $labelNews ?? 'News' }}</button>
              </li>
              <li data-id="press">
                <button>{{ $labelPress ?? 'Press' }}</button>
              </li>
            </ul>
          </div>

          <div class="col-12 mb-5 newsListing">
            <div class="row gx-lg-5 g-5 newsContainer">

            </div>
          </div>
        </div>
      </div>
    </div>

    <button type="button" id="loadMoreRecord" class="ctaBtn borderBtn" style="display: table; margin:0 auto;">{{ $labelLoadMore ?? 'Load More' }}</button>
  
  </div>
</section>