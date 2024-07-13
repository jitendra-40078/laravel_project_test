<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 2 - Offices</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-6',
            'inputLabel' => 'Heading (Red Color)',
            'inputId' => 'sec2HeadingRed',
            'placeHolder' => 'Enter heading',
            'value' => $headingRed ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-6',
            'inputLabel' => 'Heading',
            'inputId' => 'sec2Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

        </div>
      </div>
    </div>
  </div>
</div>