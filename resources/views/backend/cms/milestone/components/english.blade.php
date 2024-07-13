<div class="row g-3 enFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For English</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Content',
            'inputId' => 'contentEn',
            'value' => $content['en'] ?? '',
            'enableEditor' => true
          ])

        </div>
      </div>
    </div>
  </div>
</div>