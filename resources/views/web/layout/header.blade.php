<header class="py-4">
  <div class="container">
    <div class="row align-items-center">
      
      <div class="col-auto">
        <a href="{{ route('web.homePage') }}"><img src="{{ asset('web/images/logo.svg') }}" class="logo" alt="" /></a>
      </div>

      <div class="col mobileMenuBox">
        <div class="container">
          <ul class="menuListing">
            <li>
              <a href="#">{{ __('web.riaas') }}</a>
              <div class="dropdown">
                <div class="container p-lg-0">
                  <ul>
                    <li><a href="{{ route('web.whatriaasPage') }}">{{ __('web.whatRiaas') }}</a></li>
                    <li><a href="{{ route('web.useCasePage') }}">{{ __('web.useCase') }}</a></li>
                    <!-- <li><a href="#">RiaaSPlatform</a></li>
                    <li><a href="#">Monitoring and Control Service</a></li>
                    <li><a href="#">AIDatatoModel Pipeline</a></li> -->
                  </ul>
                </div>
              </div>
            </li>
            <li>
                <a href="{{ route('web.companyPage') }}">{{ __('web.company') }}</a>
                <!-- <div class="dropdown">
                    <div class="container p-lg-0">
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Milestones</a></li>
                            <li><a href="#">Leadership</a></li>
                            <li><a href="#">Location</a></li>
                        </ul>
                    </div>
                </div> -->
            </li>
            <li>
                <a href="{{ route('web.newsPage') }}">{{ __('web.news') }}</a>
            </li>
            <li>
                <a href="{{ route('web.careerPage') }}">{{ __('web.career') }}</a>
            </li>
            <li>
                <a href="{{ route('web.blogsPage') }}">{{ __('web.blog') }}</a>
            </li>
          </ul>

          <div class="row justify-content-center mt-4 d-flex d-md-none">

            <div class="col-auto">
              <a href="#" class="ctaBtn loginBtn">{{ __('web.partnerLogin') }}</a>
            </div>

            <div class="col-auto">
              <a href="{{ route('web.contactPage') }}" class="ctaBtn">{{ __('web.requestDemo') }}</a>
            </div>

          </div>
        </div>
      </div>

      <div class="col-auto ms-auto ms-lg-0">
        <div class="row align-items-center gx-1 gx-md-3">
          <div class="col-auto">
            <a href="{{ route('language.switch', 'en') }}">{{ __('web.En') }}</a> | <a href="{{ route('language.switch', 'kr') }}">{{ __('web.Kr') }}</a>
          </div>

          <div class="col-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <path
                    d="M2 12H22M2 12C2 17.5228 6.47715 22 12 22M2 12C2 6.47715 6.47715 2 12 2M22 12C22 17.5228 17.5228 22 12 22M22 12C22 6.47715 17.5228 2 12 2M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22M12 2C9.49872 4.73835 8.07725 8.29203 8 12C8.07725 15.708 9.49872 19.2616 12 22"
                    stroke="#1E1E2C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>

          {{-- <div class="col-auto d-none d-md-block">
            <a href="#" class="ctaBtn loginBtn">{{ __('web.partnerLogin') }}</a>
          </div> --}}

          <div class="col-auto d-none d-md-block">
            <a href="{{ route('web.contactPage') }}" class="ctaBtn">{{ __('web.requestDemo') }}</a>
          </div>
        </div>
      </div>

      <div class="col-auto d-lg-none">
        <button class="menuBtn">
          <span></span><span></span><span></span><span></span>
        </button>
      </div>

    </div>
  </div>
</header>