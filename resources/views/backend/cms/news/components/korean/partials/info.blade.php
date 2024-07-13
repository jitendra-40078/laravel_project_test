<div class="row g-3">

  @include('backend.partials.media-selector', [
    'sectionName' => 'imageKr',
    'sectionLabel' => 'Image (1000 x 500 px)',
    'sectionValue' => $image['kr'] ?? '',
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Title',
    'inputId' => 'titleKr',
    'placeHolder' => 'Enter title',
    'value' => $title['kr'] ?? ''
  ])

  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Short Description',
    'inputId' => 'shortDescKr',
    'value' => $short_description['kr'] ?? '',
    'enableEditor' => false
  ])

</div>