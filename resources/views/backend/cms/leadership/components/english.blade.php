<div class="row g-3 enFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For English</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.media-selector', [
            'sectionName' => 'imageEn',
            'sectionLabel' => 'Image (500 x 500 px)',
            'sectionValue' => $image['en'] ?? '',
          ])

          <div class="col-md-8"></div>

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-sm-4',
            'inputLabel' => 'Name',
            'inputId' => 'nameEn',
            'placeHolder' => 'Enter name',
            'value' => $name['en'] ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-sm-4',
            'inputLabel' => 'Designation',
            'inputId' => 'designationEn',
            'placeHolder' => 'Enter designation',
            'value' => $designation['en'] ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Description',
            'inputId' => 'descriptionEn',
            'value' => $description['en'] ?? '',
            'enableEditor' => true
          ])

        </div>
      </div>
    </div>
  </div>
</div>