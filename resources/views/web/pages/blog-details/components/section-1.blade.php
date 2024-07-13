@if ( isset($data) || isset($popular) )
<section>
  <div class="progress-container">
    <div class="progress-bar" id="progressBar"></div>
  </div>
  
  <div class="py-5">
    <div class="container">
      <div class="row gx-lg-5">

        @if ( isset($data['title']) || isset($data['image']) || isset($data['category']) )
        <div class="col-lg-8 pe-lg-5 mb-5 mb-lg-0">
          <div class="newDetailWrp">
            
            <div class="newsImageWrp mb-2">
              <div class="newsPic">
                @include('web.pages.partials.image', [
                  'imageUrl' => $data['image'][$locale ?? 'en'] ?? '',
                  'caption' => $data['title'][$locale ?? 'en'] ?? ''
                ])
              </div>
            </div>

            <p class="date">{{ $locale === 'en' ? ($data['category']['nameEn'] ?? '') : ($data['category']['nameKr'] ?? '') }} <span>{{ $data['publish_date'] ? date("F d, Y", strtotime($data['publish_date'])) : '' }}</span></p>

            <h2 class="newsMainTitle">{{ $data['title'][$locale ?? 'en'] ?? '' }}</h2>
            
            <div class="shareArticle d-flex justify-content-center align-items-center">
              <span>{{ $section['shareText'] ?? '' }}:</span>
              <div class="sharethis-inline-share-buttons"></div>
            </div>

            @include('web.pages.blog-details.components.cards.layout', [
              'content' => $data['content'] ?? ''
            ])

            <div class="shareArticle d-flex justify-content-center align-items-center">
              <span>{{ $section['shareText'] ?? '' }}:</span>
              <div class="sharethis-inline-share-buttons"></div>
            </div>
          </div>
        </div>
        @endif

        @if ( isset($popularBlogs) && count($popularBlogs) > 0 )
        <div class="col-lg-4" data-sticky_parent>
          <div class="sticky" data-sticky_column>
            <div class="blogListingTitle">
              <div class="col-auto"><h4>{{ $section['popular'] ?? '' }}</h4></div>
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
  </div>
</section>
@endif