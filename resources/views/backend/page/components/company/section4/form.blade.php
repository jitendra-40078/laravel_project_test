<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 4 - Leadership</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Heading',
            'inputId' => 'sec4Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

          <div class="col-12">
            <a 
              class="btn btn-primary" 
              href="{{ route('cms.leadership.list') }}" 
              target="_blank">Manage Leadership</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>