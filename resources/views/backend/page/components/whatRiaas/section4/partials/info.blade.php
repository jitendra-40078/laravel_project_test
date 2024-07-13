<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading (Red color)',
    'inputId' => 'sec4HeadingRed',
    'placeHolder' => 'Enter heading',
    'value' => $sec4HeadingRed ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Heading',
    'inputId' => 'sec4Heading',
    'placeHolder' => 'Enter heading',
    'value' => $sec4Heading ?? ''
  ])

  {{-- @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'sec4SubHeading',
    'placeHolder' => 'Enter sub heading',
    'value' => $sec4SubHeading ?? ''
  ]) --}}

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'sec4SubHeading',
    'value' => $sec4SubHeading ?? '',
    'enableEditor' => false
  ])
</div>