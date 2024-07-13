<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Section 3 - Milestone</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Heading',
            'inputId' => 'sec3Heading',
            'placeHolder' => 'Enter heading',
            'value' => $heading ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Description',
            'inputId' => 'sec3Description',
            'value' => $description ?? '',
            'enableEditor' => true
          ])

          @include('backend.partials.media-selector', [
            'sectionName' => 'sec3Image',
            'sectionLabel' => 'Image (1600 x 700 px)',
            'sectionValue' => $image ?? '',
          ])

          <div class="col-12">
            <a 
              class="btn btn-primary" 
              href="{{ route('cms.milestone.list') }}" 
              target="_blank">Manage Milestones</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>