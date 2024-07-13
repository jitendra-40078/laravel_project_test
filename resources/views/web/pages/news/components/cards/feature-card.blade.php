@if ( isset($type) || isset($slug) || isset($title) || isset($short_description) || isset($image) || isset($publish_date) )
<div class="swiper-slide">
  <div class="ftNewsContainer">
    <div class="row gx-0">

      <div class="col-md-7">
        <div class="featNewsPic">
          @include('web.pages.partials.image', [
            'imageUrl' => $image[$locale ?? 'en'] ?? '',
            'caption' => $image[$locale ?? 'en'] ?? ''
          ])
        </div>
      </div>

      <div class="col-md-5">
        <div class="newsBox">
          <div class="newsContent">
            <span>{{ $type[$locale ?? 'en'] ?? '' }}</span>
            <h4>{{ $title[$locale ?? 'en'] ?? '' }}</h4>
            <p>{{ $short_description[$locale ?? 'en'] ?? '' }}</p>

            <div class="d-block">
              @isset($publish_date)
              <div class="col-auto date">{{ date("M d, Y", strtotime($publish_date) )}}</div>
              @endisset
             
              @isset($slug)
              <div class="col-auto">
                <a href="{{ route('web.newsDetails', $slug) }}">{{ $data['labelReadMore'] ?? 'Read More' }}</a>
              </div>
              @endisset
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif