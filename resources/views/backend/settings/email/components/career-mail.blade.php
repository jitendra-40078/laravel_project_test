<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">Career Mailer</h6>
      </div>

      <div class="card-body">
        <form id="careerEmailUpdateForm">
          <div class="row g-3">

            @include('backend.partials.inputs.hidden', [
              'inputId' => 'careerId',
              'value' => $id ?? ''
            ])
            
            @include('backend.partials.inputs.text', [
              'wrapperClass' => 'col-12',
              'inputLabel' => 'Mail Subject',
              'inputId' => 'careerSubject',
              'placeHolder' => 'Enter subject',
              'value' => $options['subject'] ?? ''
            ])

            @include('backend.partials.inputs.text', [
              'wrapperClass' => 'col-12',
              'inputLabel' => 'Email ids ( To )',
              'inputId' => "careerToEmail",
              'placeHolder' => 'Enter emails',
              'value' => $options['toEmails'] ?? '',
              'hintText' => 'Please enter multiple email IDs in a comma-separated format. For example: john.doe@example.com, jane.smith@example.com'
            ])

            @include('backend.partials.inputs.text', [
              'wrapperClass' => 'col-12',
              'inputLabel' => 'Email ids ( CC )',
              'inputId' => "careerCcEmail",
              'placeHolder' => 'Enter emails',
              'value' => $options['ccEmails'] ?? '',
              'hintText' => 'Please enter multiple email IDs in a comma-separated format. For example: john.doe@example.com, jane.smith@example.com'
            ])

            <div class="col-12">
              <button type="submit" class="btn btn-success">Update</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>