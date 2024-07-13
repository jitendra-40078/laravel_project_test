<section class="bgContact mb-lg-0 px-3">
  <div class="container ">

    @if ( isset($headingRed) || isset($heading) || isset($subHeading) )
    <div class="row justify-content-center py-5">
      <div class="col-lg-7">
        <div class="contactWrp">
          <h4 class="text-center mb-4">{{ $headingRed ?? '' }} <span>{{ $heading ?? '' }}</span></h4>
        </div>
      </div>

      <div class="col-lg-7">
        <p class="text-center contactPara">{!! nl2br($subHeading ?? '') !!}</p>
      </div>
    </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="formWrp mb-5">
          
          <form id="contactEnquiryForm" class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
              <select name="country" id="country" class="form-select" required>
                <option value="">{{ __('web.contactCountryLabel') }} *</option>
                @if ( isset($countries) && count($countries) > 0 )
                  @foreach ($countries as $c)
                    <option value="{{ $locale === 'en' ? $c->nameEn : $c->nameKr }}">{{ $locale === 'en' ? $c->nameEn : $c->nameKr }}</option>
                  @endforeach
                @endif
              </select>
              <label for="country" class="invalid-feedback"></label>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
              <input 
                type="text"
                id="company" 
                name="company" 
                placeholder="{{ __('web.contactOrgLabel') }} *" 
                class="form-control"
                maxlength="100"
                required>
              <label for="company" class="invalid-feedback"></label>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
              <input 
                type="text"
                id="name" 
                name="name" 
                placeholder="{{ __('web.contactNameLabel') }} *" 
                class="form-control"
                maxlength="100"
                required>
              <label for="name" class="invalid-feedback"></label>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
              <input 
                type="email" 
                id="email"
                name="email" 
                placeholder="{{ __('web.contactEmailLabel') }} *"
                class="form-control"
                maxlength="150"
                required>
              <label for="email" class="invalid-feedback"></label>
            </div>
                    
            <div class="col-lg-12 col-md-12 col-sm-6 mb-4">
              <input 
                type="text" 
                id="subject"
                name="subject"
                placeholder="{{ __('web.contactSubjectLabel') }} *"
                class="form-control"
                maxlength="150">
              <label for="subject" class="invalid-feedback"></label>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-6 mb-4">
              <textarea 
                id="message"
                name="message"
                cols="30" 
                rows="5" 
                class="form-control" 
                placeholder="{{ __('web.contactMessageLabel') }}"></textarea>
              <label for="message" class="invalid-feedback"></label>
            </div>

            <button type="submit" class="ctaBtn d-table mx-auto w-auto mb-5">{{ __('web.submit') }}</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>