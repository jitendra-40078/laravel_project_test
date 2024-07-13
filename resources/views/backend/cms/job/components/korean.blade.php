<div class="row g-3 krFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For Korean</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-sm-8',
            'inputLabel' => 'Job Title',
            'inputId' => 'titleKr',
            'placeHolder' => 'Enter job title',
            'value' => $title['kr'] ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-sm-4',
            'inputLabel' => 'Location',
            'inputId' => 'locationKr',
            'placeHolder' => 'Enter location',
            'value' => $location['kr'] ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Description',
            'inputId' => 'descriptionKr',
            'value' => $description['kr'] ?? '',
            'enableEditor' => true
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Responsibility',
            'inputId' => 'responsibilityKr',
            'value' => $responsibility['kr'] ?? '',
            'enableEditor' => true
          ])

        </div>
      </div>
    </div>
  </div>
</div>