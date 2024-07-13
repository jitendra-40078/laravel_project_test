@if ( 
  isset($visionImage) || 
  isset($visionHeading) || 
  isset($visionDescription) || 
  isset($missionImage) || 
  isset($missionHeading) || 
  isset($missionDescription) 
)
<section class="mb-5" id="scrollSection">
  <div class="py-lg-5 container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        @if ( isset($visionImage) || isset($visionHeading) || isset($visionDescription) )
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 animateThis slideRight">
            <div class="vmTxt">
              <div class="title">
                <h2><span>{{ $visionHeading ?? '' }}</span></h2>
              </div>
              {!! $visionDescription ?? '' !!}
            </div>
          </div>
          <div class="col-lg-6 mb-4 mb-lg-5 animateThis slideLeft">
            <div class="vmPic">
              @include('web.pages.partials.image', [
                'imageUrl' => $visionImage,
                'caption' => $visionHeading
              ])
            </div>
          </div>
        </div>
        @endif

        @if ( isset($missionImage) || isset($missionHeading) || isset($missionDescription) )
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 order-lg-last animateThis slideLeft">
            <div class="vmTxt">
              <div class="title">
                <h2><span>{{ $missionHeading ?? '' }}</span></h2>
              </div>
              {!! $missionDescription ?? '' !!}
            </div>
          </div>
          <div class="col-lg-6 animateThis slideRight">
            <div class="vmPic">
              @include('web.pages.partials.image', [
                'imageUrl' => $missionImage,
                'caption' => $missionHeading
              ])
            </div>
          </div>
        </div>
        @endif

      </div>
    </div>
  </div>
</section>
@endif