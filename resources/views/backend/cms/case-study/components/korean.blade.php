<div class="row g-3 krFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For Korean</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.media-selector', [
            'sectionName' => 'logoKr',
            'sectionLabel' => 'Logo (100 x 100 px)',
            'sectionValue' => $logo['kr'] ?? ''
          ])

          @include('backend.partials.media-selector', [
            'sectionName' => 'imageKr',
            'sectionLabel' => 'Image (1000 x 500 px)',
            'sectionValue' => $image['kr'] ?? ''
          ])

          @include('backend.partials.media-selector', [
            'sectionName' => 'reportKr',
            'sectionLabel' => 'Report',
            'sectionValue' => $report['kr'] ?? '',
            "mediaUploadBtnText" => "Add File"
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
            'inputLabel' => 'Content',
            'inputId' => 'contentKr',
            'value' => $content['kr'] ?? '',
            'enableEditor' => false
          ])

        </div>
      </div>
    </div>
  </div>
</div>