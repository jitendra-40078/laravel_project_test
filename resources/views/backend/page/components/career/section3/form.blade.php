<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 3 - Newsletter</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Heading',
            'inputId' => 'sec3Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'sec3SubHeading',
            'placeHolder' => 'Enter sub heading',
            'value' => $subHeading ?? ''
          ])

        </div>
      </div>
    </div>
  </div>
</div>