<div class="row g-3 enFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For English</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.media-selector', [
            'sectionName' => 'logoEn',
            'sectionLabel' => 'Logo (100 x 100 px)',
            'sectionValue' => $logo['en'] ?? '',
          ])

          @include('backend.partials.media-selector', [
            'sectionName' => 'imageEn',
            'sectionLabel' => 'Image (1000 x 500 px)',
            'sectionValue' => $image['en'] ?? '',
          ])

          @include('backend.partials.media-selector', [
            'sectionName' => 'reportEn',
            'sectionLabel' => 'Report',
            'sectionValue' => $report['en'] ?? '',
            "mediaUploadBtnText" => "Add File"
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
            'inputLabel' => 'Content',
            'inputId' => 'contentEn',
            'value' => $content['en'] ?? '',
            'enableEditor' => false
          ])

        </div>
      </div>
    </div>
  </div>
</div>