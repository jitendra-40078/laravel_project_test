<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Banner</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Heading 1',
            'inputId' => 'heading1',
            'placeHolder' => 'Enter heading',
            'value' => $heading1 ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Heading 2',
            'inputId' => 'heading2',
            'placeHolder' => 'Enter heading',
            'value' => $heading2 ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-9',
            'inputLabel' => 'Counter Text',
            'inputId' => 'counterText',
            'placeHolder' => 'Enter counter text',
            'value' => $counterText ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-3',
            'inputLabel' => 'Counter Unit',
            'inputId' => 'counterUnit',
            'placeHolder' => 'Enter counter unit',
            'value' => $counterUnit ?? ''
          ])
          
          @include('backend.partials.media-selector', [
            'sectionName' => 'bannerImage',
            'sectionLabel' => 'Image / Video',
            'sectionValue' => $image ?? '',
          ])

        </div>
      </div>
    </div>
  </div>
</div>