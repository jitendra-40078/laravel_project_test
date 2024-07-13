<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading (Red color)',
    'inputId' => 'sec2HeadingRed',
    'placeHolder' => 'Enter heading',
    'value' => $sec2HeadingRed ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading',
    'inputId' => 'sec2Heading',
    'placeHolder' => 'Enter heading',
    'value' => $sec2Heading ?? ''
  ])

  {{-- @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'sec2SubHeading',
    'placeHolder' => 'Enter sub heading',
    'value' => $sec2SubHeading ?? ''
  ]) --}}

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'sec2SubHeading',
    'value' => $sec2SubHeading ?? '',
    'enableEditor' => false
  ])

  @include('backend.partials.media-selector', [
    'sectionName' => 'sec2Image',
    'sectionLabel' => 'Image (700 x 350 px)',
    'sectionValue' => $sec2Image ?? '',
  ])
</div>