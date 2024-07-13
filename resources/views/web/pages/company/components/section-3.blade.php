@if ( isset($image) || isset($heading) || isset($description) || isset($milestoneYears) )
<section class="mb-5">
  <div class="py-5 milestoneWrp">
    <div class="py-lg-5 container">
      <div class="row justify-content-between">
        <div class="col-lg-5 animateThis slideRight">
          <div class="title text-start">
            <h2><span>{{ $heading ?? '' }}</span></h2>
          </div>

          {!! $description ?? '' !!}
        </div>
        <div class="col-lg-6 animateThis slideLeft">
          <div class="milestonePic">
            @include('web.pages.partials.image', [
              'imageUrl' => $image ?? '',
              'caption' => $heading ?? ''
            ])
          </div>
        </div>
      </div>

      @if (isset($milestoneYears) && !empty($milestoneYears))
      <div class="row mileSwiper animateThis slideTop">
        <div class="col-2 overflow-hidden">
          <div class="swiper yearSwiper">
            <div class="swiper-wrapper">
              @foreach ($milestoneYears as $year => $milestones)
              <div class="swiper-slide" data-title="{{ $year }}">
                <span>{{ $year }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <div class="col-10">
          <div class="swiper milestoneSwiper pb-5">
            <div class="swiper-wrapper">
              @foreach ($milestoneYears as $year => $milestones)
                @foreach($milestones as $milestone)
                  @include('web.pages.company.components.cards.milestone-card', [
                    'locale' => $locale,
                    'data' => $milestone
                  ])
                @endforeach
              @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>
</section>
@endif