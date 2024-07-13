<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 3</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-6',
            'inputLabel' => 'Heading (Red color)',
            'inputId' => 'sec3HeadingRed',
            'placeHolder' => 'Enter heading',
            'value' => $headingRed ?? ''
          ])
        
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-6',
            'inputLabel' => 'Heading',
            'inputId' => 'sec3Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])
          
          {{-- @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'sec3SubHeading',
            'placeHolder' => 'Enter sub heading',
            'value' => $subHeading ?? ''
          ]) --}}

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'sec3SubHeading',
            'value' => $subHeading ?? '',
            'enableEditor' => false
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Button',
            'inputId' => 'sec3BtnText',
            'placeHolder' => 'Enter text',
            'value' => $btnText ?? ''
          ])

          <div class="col-12">
            <a 
              class="btn btn-primary" 
              href="{{ route('cms.product.list') }}" 
              target="_blank">Manage Products</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>