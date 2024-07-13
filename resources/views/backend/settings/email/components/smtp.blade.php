<div class="row g-3">
  <div class="col-12">
    <div class="card bg-violet">

      <div class="card-header card-title">
        <h6 class="mb-0">SMTP Details</h6>
      </div>

      <div class="card-body">
        <form id="smtpUpdateForm">
          <div class="row g-3">

            @include('backend.partials.inputs.hidden', [
              'inputId' => 'smtpId',
              'value' => $id ?? ''
            ])
            
            @include('backend.partials.inputs.text', [
              'wrapperClass' => 'col-12 col-md-4',
              'inputLabel' => 'Host',
              'inputId' => 'smtpHost',
              'placeHolder' => 'Enter host',
              'value' => $options['host'] ?? ''
            ])
  
            @include('backend.partials.inputs.text', [
              'wrapperClass' => 'col-12 col-md-4',
              'inputLabel' => 'Host',
              'inputId' => 'smtpPort',
              'placeHolder' => 'Enter port',
              'value' => $options['port'] ?? ''
            ])

            @include('backend.partials.inputs.text', [
              'wrapperClass' => 'col-12 col-md-4',
              'inputLabel' => 'Username',
              'inputId' => 'smtpUsername',
              'placeHolder' => 'Enter username',
              'value' => $options['username'] ?? ''
            ])
  
            @include('backend.partials.inputs.text', [
              'wrapperClass' => 'col-12 col-md-4',
              'inputLabel' => 'Password',
              'inputId' => 'smtpPassword',
              'placeHolder' => 'Enter password',
              'value' => $options['password'] ?? ''
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