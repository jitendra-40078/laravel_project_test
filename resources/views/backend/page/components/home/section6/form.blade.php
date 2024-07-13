<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 6</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-6',
            'inputLabel' => 'Heading',
            'inputId' => 'sec6Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-6',
            'inputLabel' => 'Heading (Red Color)',
            'inputId' => 'sec6HeadingRed',
            'placeHolder' => 'Enter heading',
            'value' => $headingRed ?? ''
          ])

          {{-- @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'sec6SubHeading',
            'placeHolder' => 'Enter sub heading',
            'value' => $subHeading ?? ''
          ]) --}}

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'sec6SubHeading',
            'value' => $subHeading ?? '',
            'enableEditor' => false
          ])

        </div>
      </div>
    </div>
  </div>
</div>