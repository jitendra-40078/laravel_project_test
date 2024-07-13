<div 
  id="applyJob" 
  class="popupBox fancybox__content"
  style="display: none; max-width: 700px; border-radius: 10px;">

  <!-- Loader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
  </div>

  <form id="jobApplicationForm">
    <div class="container">
      <div class="row">
        <div class="applyjobTitle mb-5 text-center">
          <h4>{{ __('web.jobFormHeding') }}</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="formWrp mb-5 row">
            
            <input 
              type="hidden"
              id="jobId" 
              name="jobId">

            <input 
              type="hidden"
              id="jobTitle" 
              name="jobTitle">

            <div class="col-lg-6 col-md-6 col-sm-6 mb-5">
              <input 
                type="text"
                id="jobFirstName" 
                name="jobFirstName" 
                class="form-control"
                placeholder="{{ __('web.jobFirstNameLabel') }}*"
                maxlength="50"
                required>
              <label for="jobFirstName" class="invalid-feedback"></label>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mb-5">
              <input 
                type="text" 
                id="jobLastName"
                name="jobLastName" 
                class="form-control"
                placeholder="{{ __('web.jobLastNameLabel') }}*"
                maxlength="50"
                required>
              <label for="jobLastName" class="invalid-feedback"></label>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mb-5">
              <input 
                type="email" 
                name="jobEmail" 
                id="jobEmail"
                placeholder="{{ __('web.jobEmailLabel') }}*"
                class="form-control"
                maxlength="150"
                required>
              <label for="jobEmail" class="invalid-feedback"></label>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mb-5">
              <input 
                type="text" 
                name="jobMobile"
                id="jobMobile"
                placeholder="{{ __('web.jobMobileLabel') }}*"
                class="form-control" 
                maxlength="20"
                required>
              <label for="jobMobile" class="invalid-feedback"></label>
            </div>

            {{-- <div class="col-lg-6 col-md-6 col-sm-6"> --}}
            {{-- <div class="col-lg-12">
              <label class="mb-3">{{ __('web.jobResumeLabel') }}</label>
              <div class="drop-zone">
                <span class="drop-zone__prompt"> 
                  {{ __('web.fileText_1') }} <br> {{ __('web.or') }} <br>{{ __('web.fileText_2') }}
                </span>
                <input 
                  type="file" 
                  name="jobResume"
                  id="jobResume"
                  class="drop-zone__input">
              </div>
              <label for="jobResume" class="invalid-feedback"></label>
            </div> --}}

            <div class="col-12 col-lg-6 mb-4">                                       
              <label class="mb-3">{{ __('web.jobResumeLabel') }}*</label>
              <input 
                type="file"
                name="jobResume"
                id="jobResume"
                class="form-control fileInput"
                accept=".pdf,.doc,.docx"
                required>
              <label for="jobResume" class="invalid-feedback"></label>
            </div>

            <div class="col-12 col-lg-6 mb-4">                                       
              <label class="mb-3">{{ __('web.jobCoverLetterLabel') }}</label>
              <input 
                type="file"
                name="coverLetter"
                id="coverLetter"
                class="form-control fileInput"
                accept=".pdf,.doc,.docx">
              <label for="coverLetter" class="invalid-feedback"></label>
            </div>

            <div class="col-12 col-lg-6 mb-4">                                       
              <label class="mb-3">{{ __('web.jobOtherDocLabel') }}</label>
              <input 
                type="file"
                name="otherDoc"
                id="otherDoc"
                class="form-control fileInput"
                accept=".pdf,.doc,.docx">
              <label for="otherDoc" class="invalid-feedback"></label>
            </div>

          </div>
        </div>
      </div>
    
      <div class="row justify-content-end">
        <div class="col-auto">
          <button type="submit" class="ctaBtn d-table mx-auto w-auto mb-5">{{ __('web.submit') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>