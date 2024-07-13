@if ( isset($addressData) && !empty($addressData) )
<section>
  <div class="py-5 addressWrp">
    <div class="py-lg-5 container">
      <div class="row gx-lg-5">

        <div class="contactWrp text-center mb-5">
          <h4>{{ $headingRed ?? '' }} <span>{{ $heading ?? '' }}</span></h4>
        </div>

        @foreach ($addressData as $address)
          @include('web.pages.partials.office-card', [
            'data' => $address,
            'locale' => $locale ?? 'en'
          ])
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif