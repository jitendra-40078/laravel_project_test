<div class="row g-3">
  <div class="col-12">
    {{-- <div class="card bg-violet section-container"> --}}
    <div class="card bg-violet section-container">

      <div class="card-header card-title">
        <h6 class="mb-0">SEO</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">
          
          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Meta Title',
            'inputId' => 'metaTitle',
            'placeHolder' => 'Enter meta title',
            'value' => $metaTitle ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Meta Description',
            'inputId' => 'metaDescription',
            'value' => $metaDescription ?? '',
            'enableEditor' => false
          ])

        </div>
      </div>
    </div>
  </div>
</div>