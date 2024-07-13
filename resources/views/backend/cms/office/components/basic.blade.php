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

          @if ( isset($status) )
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

            <div class="col-md-4"></div>
          @else
            <div class="col-md-8"></div>
          @endif

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Phone',
            'inputId' => 'phone',
            'placeHolder' => 'Enter phone',
            'value' => $phone ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Fax',
            'inputId' => 'fax',
            'placeHolder' => 'Enter fax',
            'value' => $fax ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputType' => 'email',
            'inputLabel' => 'Email',
            'inputId' => 'email',
            'placeHolder' => 'Enter email',
            'value' => $email ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Map',
            'inputId' => 'map',
            'value' => $map ?? '',
            'enableEditor' => false
          ])

        </div>
      </div>
    </div>
  </div>
</div>