<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading (Red color)',
    'inputId' => 'sec6HeadingRed',
    'placeHolder' => 'Enter heading',
    'value' => $headingRed ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading',
    'inputId' => 'sec6Heading',
    'placeHolder' => 'Enter heading',
    'value' => $heading ?? ''
  ])
</div>