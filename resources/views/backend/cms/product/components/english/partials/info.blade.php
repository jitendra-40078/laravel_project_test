<div class="row g-3">
  
  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Name',
    'inputId' => 'nameEn',
    'placeHolder' => 'Enter name',
    'value' => $name['en'] ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Sub Text',
    'inputId' => 'subTextEn',
    'placeHolder' => 'Enter text',
    'value' => $subText['en'] ?? ''
  ])

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Description',
    'inputId' => 'descriptionEn',
    'value' => $description['en'] ?? '',
    'enableEditor' => true
  ])

  @include('backend.partials.media-selector', [
    'sectionName' => 'imageEn',
    'sectionLabel' => 'Image (600 x 450 px)',
    'sectionValue' => $image['en'] ?? '',
  ])

</div>