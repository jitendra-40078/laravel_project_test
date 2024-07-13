<div class="row g-3">
  
  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading',
    'inputId' => 'sec3Heading',
    'placeHolder' => 'Enter heading',
    'value' => $sec3Heading ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading (Red color)',
    'inputId' => 'sec3HeadingRed',
    'placeHolder' => 'Enter heading',
    'value' => $sec3HeadingRed ?? ''
  ])

  {{-- @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'sec3SubHeading',
    'placeHolder' => 'Enter sub heading',
    'value' => $sec3SubHeading ?? ''
  ]) --}}

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'sec3SubHeading',
    'value' => $sec3SubHeading ?? '',
    'enableEditor' => false
  ])

  @include('backend.partials.media-selector', [
    'sectionName' => 'sec3Image',
    'sectionLabel' => 'Image (600 x 400 px)',
    'sectionValue' => $sec3Image ?? ''
  ])

</div>