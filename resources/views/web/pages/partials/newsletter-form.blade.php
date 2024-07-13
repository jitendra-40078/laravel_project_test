<section>
  <div class="py-5 newsletterWrp">
    <div class="container">
      
      <div class="title">
        <h2><span>{{ isset($heading) && $heading ? $heading : __('web.newsletterHeading') }}</span></h2>
        <p>{{ isset($subHeading) && $subHeading ? $subHeading : __('web.newsletterSubHeading') }}</p>
      </div>

      <div class="row justify-content-center">
        <form id="newsletterForm" class="col-lg-6">         
          <div class="input-group mb-3">
            <input 
            type="email" 
            id="subscribeEmail"
            name="subscribeEmail"
            class="form-control" 
            id="floatingInputGroup1" 
            placeholder="{{ __('web.newsletterPlaceholder') }}">
            <button class="ctaBtn">{{ __('web.newsletterButton') }}</button>
          </div>

          <label for="subscribeEmail" class="invalid-feedback"></label>
        </form>
      </div>
      
    </div>
  </div>
</section>