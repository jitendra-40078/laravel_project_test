@if ( isset($data) && isset($locale) )
<div class="col-lg-6 mb-3 mb-lg-0 animateThis slideTop">
  <div class="addressBox d-lg-flex flex-lg-column h-100">
    <div class="col-auto"><h4>{{ $data['name'][$locale] ?? '' }}</h4></div>

    <div class="col">
      <div class="map">
        @isset($data['map'])
          <iframe src="{{ $data['map'] }}"></iframe>
        @endisset
      </div>
    </div>

    <div class="col addressContent">
      <ul>

        @if ( isset($data['phone']) || isset($data['fax']) )
        <li>
          <div class="row">
            @isset( $data['phone'] )
            <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <div class="col-auto me-3">
                  <img src="{{ asset('web/images/phone.svg') }}" alt="phone icon" />
                </div>

                <div class="col">
                  <a href="tel:{{ $data['phone'] ?? '' }}">{{ $data['phone'] ?? '' }}</a>
                </div>
              </div>
            </div>              
            @endisset

            @isset( $data['fax'] )
            <div class="col-sm-6">
              <div class="d-flex align-items-center">
                <div class="col-auto me-3">
                  <img src="{{ asset('web/images/fax.svg') }}" alt="fax icon" />
                </div>
                <div class="col">
                  <a href="tel:{{ $data['fax'] ?? '' }}">{{ $data['fax'] ?? '' }}</a>
                </div>
              </div>
            </div>
            @endisset
          </div>
        </li>
        @endif

        @if ( isset($data['email']) )
        <li>
          <div class="row">
            <div class="col-12">
              <div class="d-flex align-items-center">
                <div class="col-auto me-3">
                  <img src="{{ asset('web/images/email.svg') }}" alt="mail icon" />
                </div>
                <div class="col">
                  <a href="mailto:{{ $data['email'] ?? '' }}" >{{ $data['email'] ?? '' }}</a>
                </div>
              </div>
            </div>
          </div>
        </li>
        @endif

        @if ( isset($data['address']) )
        <li>
          <div class="row">
            <div class="col-12">
              <div class="d-flex align-items-center">
                <div class="col-auto me-3">
                  <img src="{{ asset('web/images/location.svg') }}" alt="address icon" />
                </div>
                <div class="col">{{ $data['address'][$locale] ?? '' }}</div>
              </div>
            </div>
          </div>
        </li>          
        @endif

      </ul>
    </div>
  </div>
</div>
@endif