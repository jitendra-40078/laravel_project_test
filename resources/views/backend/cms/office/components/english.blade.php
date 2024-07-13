<div class="row g-3 enFields">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">For English</h6>
      </div>

      <div class="card-body">
        <div class="row g-3">

          @include('backend.partials.inputs.text', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Name',
            'inputId' => 'nameEn',
            'placeHolder' => 'Enter name',
            'value' => $name['en'] ?? ''
          ])

          @include('backend.partials.inputs.editor', [
            'wrapperClass' => 'col-12',
            'inputLabel' => 'Address',
            'inputId' => 'addressEn',
            'value' => $address['en'] ?? '',
            'enableEditor' => false
          ])

        </div>
      </div>
    </div>
  </div>
</div>