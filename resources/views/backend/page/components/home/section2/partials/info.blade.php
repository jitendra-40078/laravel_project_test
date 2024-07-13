<div class="row g-3">
          
  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-3',
    'inputLabel' => 'Heading (Red color)',
    'inputId' => 'sec2RedHeading',
    'placeHolder' => 'Enter heading',
    'value' => $sec2RedHeading ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-9',
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

</div>