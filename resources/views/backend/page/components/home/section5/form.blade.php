<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 5</h6>
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

          {{-- @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'sec5SubHeading',
            'placeHolder' => 'Enter sub heading',
            'value' => $subHeading ?? ''
          ]) --}}

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Sub Heading',
            'inputId' => 'sec5SubHeading',
            'value' => $subHeading ?? '',
            'enableEditor' => false
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-3',
            'inputLabel' => 'Button Text',
            'inputId' => 'sec5BtnText',
            'placeHolder' => 'Enter button text',
            'value' => $btnText ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-9',
            'inputLabel' => 'Button Link',
            'inputType' => 'link',
            'inputId' => 'sec5BtnLink',
            'placeHolder' => 'Enter button link',
            'value' => $btnLink ?? ''
          ])

          <div class="col-12">
            <a 
              class="btn btn-primary" 
              href="{{ route('cms.testimonial.list') }}" 
              target="_blank">Manage Testimonials</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>