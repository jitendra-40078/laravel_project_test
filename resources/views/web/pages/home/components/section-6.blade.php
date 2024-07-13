@if ( isset($news) && count($news) > 0 )
<section>
  <div class="newsWrp py-5">
    <div class="container py-lg-5">
      <div class="title animateThis slideTop">
        <h2>{{ $section6Data['heading'] ?? '' }} <span>{{ $section6Data['headingRed'] ?? '' }}</span></h2>
        <p>{!! nl2br($section6Data['subHeading'] ?? '') !!}</p>
      </div>

      <div class="row gx-xxl-5">

        {{-- @for ($i=0; $i<count($news); $i++)
          @if ( $i === 0 )
            <div class="col-lg-6 mb-4 mb-lg-0">
              <div class="newsBox animateThis slideTop">
                <div class="newsPic">
                  @include('web.pages.partials.image', [
                    'imageUrl' => $news[$i]['image'][$locale ?? 'en'] ?? '',
                    'caption' => $news[$i]['title'][$locale ?? 'en'] ?? ''
                  ])
                </div>
                <div class="newsContent">
                  <h4>{{ $news[$i]['title'][$locale ?? 'en'] ?? '' }}</h4>
                  <p>{{ $news[$i]['short_description'][$locale ?? 'en'] ?? '' }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    @isset($news[$i]['publish_date'])
                    <div class="col-auto date">{{ date("M d, Y", strtotime($news[$i]['publish_date']) )}}</div>
                    @endisset
                    
                    @isset($news[$i]['slug'])
                    <div class="col-auto">
                      <a href="{{ route('web.newsDetails', $news[$i]['slug']) }}">Read More</a>
                    </div>
                    @endisset
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endfor --}}

        {{-- <div class="col-lg-6">
          <div class="row gx-xxl-5 h-100">
            @for ($i=0; $i<count($news); $i++)
              @if ( $i !== 0 )
                <div class="col-lg-6 mb-4 mb-lg-0 newsGrid">
                  <div class="newsBox animateThis slideTop">
                    <div class="d-flex flex-column h-100">
                      
                      @if ( $i % 2 !== 0 )
                        <div class="col-auto order-lg-last">
                          <div class="newsPic">
                            @include('web.pages.partials.image', [
                              'imageUrl' => $news[$i]['image'][$locale ?? 'en'] ?? '',
                              'caption' => $news[$i]['title'][$locale ?? 'en'] ?? ''
                            ])
                          </div>
                        </div>

                        <div class="col">
                          <div class="newsContent">
                            <h4>{{ $news[$i]['title'][$locale ?? 'en'] ?? '' }}</h4>
                            <p>{{ $news[$i]['short_description'][$locale ?? 'en'] ?? '' }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                              @isset($news[$i]['publish_date'])
                              <div class="col-auto date">{{ date("M d, Y", strtotime($news[$i]['publish_date']) )}}</div>
                              @endisset
                              
                              @isset($news[$i]['slug'])
                              <div class="col-auto">
                                <a href="{{ route('web.newsDetails', $news[$i]['slug']) }}">Read More</a>
                              </div>
                              @endisset
                            </div>
                          </div>
                        </div>
                      @else
                        <div class="col-auto">
                          <div class="newsPic">
                            @include('web.pages.partials.image', [
                              'imageUrl' => $news[$i]['image'][$locale ?? 'en'] ?? '',
                              'caption' => $news[$i]['title'][$locale ?? 'en'] ?? ''
                            ])
                          </div>
                        </div>

                        <div class="col">
                          <div class="newsContent">
                            <h4>{{ $news[$i]['title'][$locale ?? 'en'] ?? '' }}</h4>
                            <p>{{ $news[$i]['short_description'][$locale ?? 'en'] ?? '' }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                              @isset($news[$i]['publish_date'])
                              <div class="col-auto date">{{ date("M d, Y", strtotime($news[$i]['publish_date']) )}}</div>
                              @endisset
                              
                              @isset($news[$i]['slug'])
                              <div class="col-auto">
                                <a href="{{ route('web.newsDetails', $news[$i]['slug']) }}">Read More</a>
                              </div>
                              @endisset
                            </div>
                          </div>
                        </div>
                      @endif

                    </div>
                  </div>
                </div>
              @endif
            @endfor
          </div>
        </div> --}}

        @for ($i=0; $i<count($news); $i++)
          <div class="col-lg-4 mb-4 mb-lg-0 newsGrid">
            <div class="newsBox animateThis slideTop">
              <div class="d-flex flex-column h-100">
                
                <div class="col-auto">
                  <div class="newsPic m-0 mb-4">
                    <img class="object-fit-cover"
                      src="{{ asset($news[$i]['image'][$locale ?? 'en'] ?? '') }}" 
                      alt="{{ $news[$i]['title'][$locale ?? 'en'] ?? '' }}" />
                  </div>
                </div>

                <div class="col">
                  <div class="newsContent">
                    <h4>{{ $news[$i]['title'][$locale ?? 'en'] ?? '' }}</h4>
                    <p>{{ $news[$i]['short_description'][$locale ?? 'en'] ?? '' }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                      @isset($news[$i]['publish_date'])
                      <div class="col-auto date">{{ date("M d, Y", strtotime($news[$i]['publish_date']) )}}</div>
                      @endisset
                      
                      @isset($news[$i]['slug'])
                      <div class="col-auto">
                        <a href="{{ route('web.newsDetails', $news[$i]['slug']) }}">Read More</a>
                      </div>
                      @endisset
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        @endfor

      </div>
    </div>
  </div>
</section>
@endif