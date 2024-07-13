<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Basic Information</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.select', [
            'wrapperClass' => 'col-12 col-md-3',
            'inputLabel' => 'Language',
            'inputId' => 'language',
            'value' => $language ?? '',
            'inputOptions' => [
              ['id' => 'en', 'name' => 'English only'],
              ['id' => 'kr', 'name' => 'Korean only'],
              ['id' => 'both', 'name' => 'Both'],
            ]
          ])

          @isset($status)
            @include('backend.partials.inputs.select', [
              'wrapperClass' => 'col-12 col-md-3',
              'inputLabel' => 'Status',
              'inputId' => 'status',
              'value' => $status ?? '',
              'inputOptions' => [
                ['id' => 'A', 'name' => 'Active'],
                ['id' => 'D', 'name' => 'Deactive']
              ]
            ])
          @endisset

        </div>
      </div>
    </div>
  </div>
</div>