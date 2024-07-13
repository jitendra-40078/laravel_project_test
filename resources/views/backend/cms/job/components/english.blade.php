<div class="row g-3 enFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For English</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-sm-8',
            'inputLabel' => 'Job Title',
            'inputId' => 'titleEn',
            'placeHolder' => 'Enter job title',
            'value' => $title['en'] ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-sm-4',
            'inputLabel' => 'Location',
            'inputId' => 'locationEn',
            'placeHolder' => 'Enter location',
            'value' => $location['en'] ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Description',
            'inputId' => 'descriptionEn',
            'value' => $description['en'] ?? '',
            'enableEditor' => true
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Responsibility',
            'inputId' => 'responsibilityEn',
            'value' => $responsibility['en'] ?? '',
            'enableEditor' => true
          ])

        </div>
      </div>
    </div>
  </div>
</div>