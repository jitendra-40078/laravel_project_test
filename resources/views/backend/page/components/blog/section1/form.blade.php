<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Labels</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Trending',
            'inputId' => 'headTrending',
            'placeHolder' => 'Enter text',
            'value' => $trending ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Latest',
            'inputId' => 'headLatest',
            'placeHolder' => 'Enter text',
            'value' => $latest ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Popular',
            'inputId' => 'headPopular',
            'placeHolder' => 'Enter text',
            'value' => $popular ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Load More',
            'inputId' => 'btnText',
            'placeHolder' => 'Enter text',
            'value' => $btnText ?? ''
          ])

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12 col-md-4',
            'inputLabel' => 'Label for Share Button',
            'inputId' => 'shareText',
            'placeHolder' => 'Enter text',
            'value' => $shareText ?? ''
          ])

        </div>
      </div>
    </div>
  </div>
</div>