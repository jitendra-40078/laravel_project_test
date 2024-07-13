<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 7 - Popup</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.media-selector', [
            'sectionName' => 'sec7Image',
            'sectionLabel' => 'Image (500 x 500 px)',
            'sectionValue' => $image ?? '',
          ])

          <div class="col-md-6"></div>

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-8',
            'inputLabel' => 'Label for Checkbox',
            'inputId' => 'sec7BoxText',
            'placeHolder' => 'Enter text',
            'value' => $boxText ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Button',
            'inputId' => 'sec7BtnText',
            'placeHolder' => 'Enter text',
            'value' => $btnText ?? ''
          ])

        </div>
      </div>
    </div>
  </div>
</div>