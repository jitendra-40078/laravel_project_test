<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Banner</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Heading',
            'inputId' => 'heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

          {{-- @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'subHeading',
            'placeHolder' => 'Enter sub heading',
            'value' => $subHeading ?? ''
          ]) --}}

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'subHeading',
            'value' => $subHeading ?? '',
            'enableEditor' => false
          ])

          @include('backend.partials.media-selector', [
            'sectionName' => 'bannerImage',
            'sectionLabel' => 'Image (1600 x 700 px)',
            'sectionValue' => $image ?? '',
          ])

        </div>
      </div>
    </div>
  </div>
</div>