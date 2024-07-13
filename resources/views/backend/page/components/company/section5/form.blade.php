<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 5 - Locations</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Heading',
            'inputId' => 'sec5Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

          <div class="col-12">
            <a 
              class="btn btn-primary" 
              href="{{ route('cms.office.list') }}" 
              target="_blank">Manage Offices</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>