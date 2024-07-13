<div class="row g-3">
  
  @include('backend.partials.media-selector', [
    'sectionName' => 'imageEn',
    'sectionLabel' => 'Image (1000 x 500 px)',
    'sectionValue' => $image['en'] ?? '',
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Title',
    'inputId' => 'titleEn',
    'placeHolder' => 'Enter title',
    'value' => $title['en'] ?? ''
  ])

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Short Description',
    'inputId' => 'shortDescEn',
    'value' => $short_description['en'] ?? '',
    'enableEditor' => false
  ])

</div>