<div class="row g-3">

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Name',
    'inputId' => 'sec3Pr2Name',
    'placeHolder' => 'Enter name',
    'value' => $name ?? ''
  ])

  @include('backend.partials.inputs.text', [
    'wrapperClass' => 'col-12 col-md-6',
    'inputLabel' => 'Sub Text',
    'inputId' => 'sec3Pr2Text',
    'placeHolder' => 'Enter text',
    'value' => $text ?? ''
  ])
  
  @include('backend.partials.inputs.editor', [
    'wrapperClass' => 'col-12',
    'inputLabel' => 'Description',
    'inputId' => "sec3Pr2Desc",
    'value' => $description ?? '',
    'enableEditor' => true
  ])

  @include('backend.partials.media-selector', [
    'sectionName' => "sec3Pr2Image",
    'sectionLabel' => 'Image',
    'sectionValue' => $image ?? ''
  ])

</div>