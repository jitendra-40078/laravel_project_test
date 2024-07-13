@if ( isset($cards) && is_array($cards) && count($cards) > 0 )
<section class="mb-5">
  <div class="py-lg-5 container animateThis slideTop">

    <div class="title">
      <h2><span>{{ $headingRed ?? '' }}</span> {{ $heading ?? '' }}</h2>
    </div>

    <ul class="mb-5 pb-lg-5 workList">
      @for ( $i=0; $i<3; $i++)
        @if ( isset($cards[$i]['slug']) && isset($cards[$i]['title']) )
          {{-- <li data-title="{{ $cards[$i]['slug'] ?? '' }}" class="{{ $i==1 ? 'active' : '' }}">{{ $cards[$i]['title'] ?? '' }}</li> --}}
          <li data-title="{{ 'circularCard-'.$i+1 }}" class="{{ $i==1 ? 'active' : '' }}">{{ $cards[$i]['title'] ?? '' }}</li>
        @endif
      @endfor
    </ul>

    <div class="dashedcircleWrp">
      <div class="position-relative">

        <span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <path
              fill-rule="evenodd"
              d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
            />
          </svg>
        </span>
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 15">
            <path
              d="M21.408 2.33289L12.8766 13.1309C12.5734 13.5147 12.0181 13.5798 11.6343 13.2766L0.83629 4.74523C0.452486 4.44199 0.38737 3.8867 0.690608 3.50289C0.993846 3.11909 1.54914 3.05397 1.93294 3.35721L12.0369 11.3402L20.0199 1.23625C20.1712 1.04483 20.386 0.932336 20.6109 0.905958C20.8359 0.879579 21.0709 0.939323 21.2623 1.09056C21.6461 1.3938 21.7112 1.94909 21.408 2.33289Z"
            />
          </svg>
        </span>
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 25">
            <path
              d="M19.1379 18.9172L5.84523 15.3554C5.37275 15.2288 5.0932 14.7446 5.2198 14.2722L8.78156 0.979501C8.90816 0.507027 9.39235 0.227479 9.86482 0.354078C10.3373 0.480677 10.6168 0.96487 10.4902 1.43734L7.15742 13.8756L19.5957 17.2085C19.8313 17.2716 20.0197 17.4243 20.1329 17.6205C20.2461 17.8166 20.2843 18.0561 20.2211 18.2918C20.0945 18.7642 19.6104 19.0438 19.1379 18.9172Z"
            />
          </svg>
        </span>
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 25">
            <path
              d="M8.78106 23.1575L5.21931 9.86482C5.09271 9.39235 5.37226 8.90816 5.84473 8.78156L19.1374 5.2198C19.6099 5.09321 20.0941 5.37275 20.2207 5.84523C20.3472 6.3177 20.0677 6.80189 19.5952 6.92849L7.15695 10.2613L10.4898 22.6996C10.5529 22.9352 10.5148 23.1747 10.4015 23.3709C10.2883 23.567 10.1 23.7198 9.86433 23.7829C9.39186 23.9095 8.90766 23.63 8.78106 23.1575Z"
            />
          </svg>
        </span>
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 15">
            <path
              d="M0.813532 10.6662L11.6814 2.22403C12.0676 1.92396 12.6224 1.99364 12.9224 2.37993L21.3647 13.2478C21.6647 13.634 21.5951 14.1888 21.2088 14.4888C20.8225 14.7889 20.2678 14.7192 19.9677 14.3329L12.0681 4.16364L1.89877 12.0632C1.70611 12.2129 1.47062 12.2707 1.24589 12.2425C1.02117 12.2143 0.807291 12.1 0.657633 11.9073C0.357563 11.5211 0.427246 10.9663 0.813532 10.6662Z"
            />
          </svg>
        </span>

        <div class="dashedcircle">
          <img src="{{ asset('web/images/dashed-circle.svg') }}" class="circle" alt="" />

          <div>
            <div>
              <img src="{{ asset('web/images/riaasLogo.svg') }}" class="img-fluid" alt="" />
            </div>
          </div>
        </div>

        <div class="worksDetails">

          @for ( $i=3; $i>=1; $i--)
            @for ( $j=($i==3?1:2); $j>=1; $j--)
              @include('web.pages.what-riaas.components.cards.work-card', [
                'data' => $cards[$i-1]['cards'][$j-1] ?? '',
                'slug' => $cards[$i-1]['slug'] ?? '',
                'parentIndex' => $i 
              ])
            @endfor
          @endfor
          
        </div>
      </div>
    </div>
  </div>
</section>
@endif