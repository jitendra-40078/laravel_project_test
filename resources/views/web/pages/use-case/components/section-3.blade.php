@if (isset($section3Data) || isset($casestudies) )
<section>
  <div class="py-5 caseStudyWrp">
    <div class="py-lg-5 container animateThis slideTop">
      <div class="mb-4 mb-lg-5 title">
        <h2><span>{{ $section3Data['heading'] ?? '' }}</span></h2>
        <p>{!! nl2br($section3Data['subHeading'] ?? '') !!}</p>
        {{-- <p>{{ $section3Data['subHeading'] ?? '' }}</p> --}}
      </div>

      @if (isset($casestudies) && !empty($casestudies))
      <div class="row gx-lg-5">

        {{-- <div class="col-lg-4 mb-4 mb-lg-0" data-sticky_parent>--}}
        <div class="col-lg-4 mb-4 mb-lg-0">
          {{-- <div class="sticky" data-sticky_column> --}}
          <div class="caseStudyListingWrp">
            <ul class="caseStudyListing" id="myTab" role="tablist">
              @for ($i=0; $i < count($casestudies); $i++)
                @include('web.pages.use-case.components.cards.casestudy-card', [
                  'data' => $casestudies[$i] ?? null,
                  'index' => $i+1,
                  'locale' => $locale ?? 'en'
                ])
              @endfor
            </ul>
          </div>
        {{-- </div> --}}
        </div>

        <div class="col-lg-8">
          <div class="tab-content" id="myTabContent">
            @for ($i=0; $i < count($casestudies); $i++)
              @include('web.pages.use-case.components.cards.casestudy-details', [
                'data' => $casestudies[$i] ?? null,
                'index' => $i+1,
                'locale' => $locale ?? 'en'
              ])
            @endfor
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
@endif