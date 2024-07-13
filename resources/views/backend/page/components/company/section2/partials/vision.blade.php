<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Heading',
    'inputId' => 'visionHeading',
    'placeHolder' => 'Enter heading',
    'value' => $visionHeading ?? ''
  ])

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Description',
    'inputId' => 'visionDescription',
    'value' => $visionDescription ?? '',
    'enableEditor' => true
  ])

  @include('backend.partials.media-selector', [
    'sectionName' => 'visionImage',
    'sectionLabel' => 'Image (1600 x 600 px)',
    'sectionValue' => $visionImage ?? '',
  ])
</div>