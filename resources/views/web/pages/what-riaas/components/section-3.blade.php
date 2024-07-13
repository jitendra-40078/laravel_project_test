@if ( isset($products) && count($products) > 0 )
<section>
  <div class="py-5 analyzerWrp">
    <div class="py-xl-5 container">
      <div class="title">
        <h2><span>{{ $data['headingRed'] ?? '' }}</span> {{ $data['heading'] ?? '' }}</h2>
        <p>{!! nl2br($data['subHeading'] ?? '') !!}</p>
        {{-- <p>{{ $data['subHeading'] ?? '' }}</p> --}}
      </div>

      <div class="row justify-content-center">
        <div class="col-xl-11">
          @if ( count($products) > 2 )
            @include('web.pages.what-riaas.components.cards.products.layout-2.container')
          @else
            @include('web.pages.what-riaas.components.cards.products.layout-1.container')
          @endif

          <button
            class="d-table mx-auto ctaBtn border-0"
            data-bs-toggle="modal"
            data-bs-target="#diffModal"
          >
            {{ $data['btnText'] ?? "What's Different?" }}
          </button>

          @include('web.pages.what-riaas.components.cards.products.compare')

        </div>
      </div>
    </div>
  </div>
</section>
@endif