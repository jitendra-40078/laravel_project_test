<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 1 - Banner</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.media-selector', [
            'sectionName' => 'sec1Image',
            'sectionLabel' => 'Image (1600 x 700 px)',
            'sectionValue' => $image ?? '',
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Heading',
            'inputId' => 'sec1Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Read More',
            'inputId' => 'labelReadMore',
            'placeHolder' => 'Enter text',
            'value' => $labelReadMore ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for All',
            'inputId' => 'labelAll',
            'placeHolder' => 'Enter text',
            'value' => $labelAll ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for News',
            'inputId' => 'labelNews',
            'placeHolder' => 'Enter text',
            'value' => $labelNews ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Press',
            'inputId' => 'labelPress',
            'placeHolder' => 'Enter text',
            'value' => $labelPress ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Load More',
            'inputId' => 'labelLoadMore',
            'placeHolder' => 'Enter text',
            'value' => $labelLoadMore ?? ''
          ])

        </div>
      </div>
    </div>
  </div>
</div>