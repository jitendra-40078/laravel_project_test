<div class="row g-3">
    
  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Heading',
    'inputId' => 'sec4Heading',
    'placeHolder' => 'Enter heading',
    'value' => $heading ?? ''
  ])

  {{-- @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'secSub4Heading',
    'placeHolder' => 'Enter sub heading',
    'value' => $subHeading ?? ''
  ]) --}}

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Sub Heading',
    'inputId' => 'secSub4Heading',
    'value' => $subHeading ?? '',
    'enableEditor' => false
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-3',
    'inputLabel' => 'Button Text',
    'inputId' => 'sec4BtnText',
    'placeHolder' => 'Enter button text',
    'value' => $btnText ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-9',
    'inputLabel' => 'Button Link',
    'inputType' => 'link',
    'inputId' => 'sec4BtnLink',
    'placeHolder' => 'Enter button link',
    'value' => $btnLink ?? ''
  ])

</div>