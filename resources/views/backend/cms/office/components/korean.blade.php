<div class="row g-3 krFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For Korean</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Name',
            'inputId' => 'nameKr',
            'placeHolder' => 'Enter name',
            'value' => $name['kr'] ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Address',
            'inputId' => 'addressKr',
            'value' => $address['kr'] ?? '',
            'enableEditor' => false
          ])

        </div>
      </div>
    </div>
  </div>
</div>