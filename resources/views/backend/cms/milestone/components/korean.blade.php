<div class="row g-3 krFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For Korean</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Content',
            'inputId' => 'contentKr',
            'value' => $content['kr'] ?? '',
            'enableEditor' => true
          ])

        </div>
      </div>
    </div>
  </div>
</div>