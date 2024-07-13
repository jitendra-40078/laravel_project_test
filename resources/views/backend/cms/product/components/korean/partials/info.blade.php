<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Name',
    'inputId' => 'nameKr',
    'placeHolder' => 'Enter name',
    'value' => $name['kr'] ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Sub Text',
    'inputId' => 'subTextKr',
    'placeHolder' => 'Enter text',
    'value' => $subText['kr'] ?? ''
  ])

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Description',
    'inputId' => 'descriptionKr',
    'value' => $description['kr'] ?? '',
    'enableEditor' => true
  ])

  @include('backend.partials.media-selector', [
    'sectionName' => 'imageKr',
    'sectionLabel' => 'Image (600 x 450 px)',
    'sectionValue' => $image['kr'] ?? '',
  ])

</div>