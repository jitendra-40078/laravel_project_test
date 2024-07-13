<div class="row g-3 krFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For Korean</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.media-selector', [
            'sectionName' => 'imageKr',
            'sectionLabel' => 'Image (500 x 500 px)',
            'sectionValue' => $image['kr'] ?? ''
          ])

          <div class="col-md-8"></div>

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-sm-4',
            'inputLabel' => 'Name',
            'inputId' => 'nameKr',
            'placeHolder' => 'Enter name',
            'value' => $name['kr'] ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-sm-4',
            'inputLabel' => 'Designation',
            'inputId' => 'designationKr',
            'placeHolder' => 'Enter designation',
            'value' => $designation['kr'] ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Description',
            'inputId' => 'descriptionKr',
            'value' => $description['kr'] ?? '',
            'enableEditor' => true
          ])

        </div>
      </div>
    </div>
  </div>
</div>