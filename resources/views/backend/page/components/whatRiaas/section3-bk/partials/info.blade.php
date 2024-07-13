<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading (Red color)',
    'inputId' => 'sec3HeadingRed',
    'placeHolder' => 'Enter heading',
    'value' => $headingRed ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
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