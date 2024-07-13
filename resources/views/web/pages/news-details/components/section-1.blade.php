@if ( isset($title) || isset($type) || isset($publish_date) || isset($image) || isset($content) )
<section>
  <div class="progress-container">
    <div class="progress-bar" id="progressBar"></div>
  </div>

  <div class="py-5">
    <div class="container">
      <div class="row justify-content-center newDetailWrp">

        <div class="col-lg-8">
          <p class="date">{{ $type ? ucfirst($type) : '' }} <span>{{ $publish_date ? date("F j, Y", strtotime($publish_date)) : '' }}</span></p>
          <h2 class="newsMainTitle">{{ $title[$locale ?? 'en'] ?? '' }}</h2>

          <div class="newsImageWrp">
            <div class="newsPic">
              @include('web.pages.partials.image', [
                'imageUrl' => $image[$locale ?? 'en'] ?? '',
                'caption' => $image[$locale ?? 'en'] ?? ''
              ])
            </div>
            
            <div class="shareArticle d-flex justify-content-center align-items-center">
              <span>Share article:</span>
              <div class="sharethis-inline-share-buttons"></div>
            </div>
          </div>
        </div>

        @include('web.pages.news-details.components.cards.layout', [
          'content' => $content
        ])
        
      </div>
    </div>
  </div>
</section>
@endif