<footer>
  <div class="pt-5">
    <div class="container pt-lg-5">
      <div class="row mb-5 align-items-center">
        <div class="col-auto">
          <img class="logo" src="{{ asset('web/images/footLogo.svg') }}" alt="" />
        </div>
        <div class="col">
          <div class="borderLine"></div>
        </div>
      </div>
      <div class="row gx-lg-5 justify-content-between">

        @if ( isset($addressData) && !empty($addressData) )
          @foreach ($addressData as $address)
            <div class="col-sm-6 col-md-4 mb-4 mb-md-0">
              <div class="footBox">
                <h4>{{ $address->name[$locale ?? 'en'] ?? '' }}</h4>
                <p>
                  {{ $address->address[$locale ?? 'en'] ?? '' }} <br />
                  @isset( $address->phone )
                  {{ __('web.tel') }} : <a href="tel:{{ $address->phone }}">{{ $address->phone }}</a> <br />
                  @endisset
                  @isset( $address->fax )
                  {{ __('web.fax') }} : <a href="tel:{{ $address->fax }}">{{ $address->fax }}</a> <br />
                  @endisset
                  @isset( $address->email )
                  <a href="mailto:{{ $address->email }}">{{ $address->email }}</a>
                  @endisset
                </p>
              </div>
            </div>
          @endforeach
        @endif

        <div class="col-md-auto mb-4 mb-md-0">
          <div class="text-center mx-auto footBox">
            {{-- <h4>{{ __('web.familySite') }}</h4> --}}
            <a href="{{ asset('web/pdf/브로셔_2P_2024-ENG.pdf') }}" target="_blank" class="d-table mx-auto ctaBtn">{{ __('web.downloadBrochure') }}</a>

            <ul class="row gx-3 justify-content-center justify-content-md-start mt-4 footSocial">
              <li class="col-auto">
                <a href="https://www.youtube.com/c/RiaaS" target="_blank">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"
                    />
                  </svg>
                </a>
              </li>
              <li class="col-auto">
                <a
                  href="https://www.facebook.com/dareesoft"
                  target="_blank"
                >
                  <svg
                    version="1.1"
                    id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px"
                    y="0px"
                    viewBox="0 0 155.139 155.139"
                    xml:space="preserve"
                  >
                    <path
                      d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452v20.341H37.29v27.585h23.814v70.761H89.584z"
                    />
                  </svg>
                </a>
              </li>
              <li class="col-auto">
                <a
                  href="https://www.linkedin.com/company/dareesoft"
                  target="_blank"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"
                    />
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="copyrightWrp py-4 py-lg-5">
        <div class="row justify-content-between">
          <div class="col-sm-auto mb-3 mb-sm-0 text-center">
            © {{ __('web.copyright') }} | <a href="https://kwebmaker.com/" target="_blank">Kwebmaker™</a>
          </div>
          <div class="col-sm-auto">
            <ul class="otherLink">
              <li><a href="{{ route('web.contactPage') }}">{{ __('web.contactUs') }}</a></li>
              <li><a href="">{{ __('web.privacyPolicy') }}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>