<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Heading',
    'inputId' => 'missionHeading',
    'placeHolder' => 'Enter heading',
    'value' => $missionHeading ?? ''
  ])

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Description',
    'inputId' => 'missionDescription',
    'value' => $missionDescription ?? '',
    'enableEditor' => true
  ])

  @include('backend.partials.media-selector', [
    'sectionName' => 'missionImage',
    'sectionLabel' => 'Image (1600 x 600 px)',
    'sectionValue' => $missionImage ?? '',
  ])
</div>