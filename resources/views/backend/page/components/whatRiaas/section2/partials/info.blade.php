<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Heading',
    'inputId' => 'sec2Heading',
    'placeHolder' => 'Enter heading',
    'value' => $heading ?? ''
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
    'value' => $subHeading ?? '',
    'enableEditor' => false
  ])

</div>