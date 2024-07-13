<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Page Information</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Page',
            'inputId' => 'Name',
            'value' => $name,
            'disabled' => true
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Language',
            'inputId' => 'lang',
            'value' => $language == 'en' ? "English" : "Korean",
            'disabled' => true
          ])

        </div>
      </div>
    </div>
  </div>
</div>