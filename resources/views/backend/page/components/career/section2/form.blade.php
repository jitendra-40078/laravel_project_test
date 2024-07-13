<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 2</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-6',
            'inputLabel' => 'Heading',
            'inputId' => 'sec2Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-6',
            'inputLabel' => 'Heading (Red color)',
            'inputId' => 'sec2HeadingRed',
            'placeHolder' => 'Enter heading',
            'value' => $headingRed ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Description',
            'inputId' => 'sec2Description',
            'value' => $description ?? '',
            'enableEditor' => true
          ])

        </div>
      </div>
    </div>
  </div>
</div>