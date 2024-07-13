<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Heading',
    'inputId' => 'sec5Heading',
    'placeHolder' => 'Enter heading',
    'value' => $sec5Heading ?? ''
  ])

  {{-- @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'sec5SubHeading',
    'placeHolder' => 'Enter sub heading',
    'value' => $sec5SubHeading ?? ''
  ]) --}}

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'sec5SubHeading',
    'value' => $sec5SubHeading ?? '',
    'enableEditor' => false
  ])
</div>