@if ( isset($name) || isset($text) || isset($image) || isset($description) )
<div class="modal fade productPopup" id="{{ $code }}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body p-0">
        
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close">
        </button>
        
        <div class="popupProductWrp">
          <div class="row gx-lg-5 justify-content-between align-items-center mb-4 mb-lg-5">
            
            <div class="col-lg-5 mb-4 mb-lg-0">
              <div class="popupProduct">
                @if ( isset($image) && $image[$locale ?? 'en'] )
                  <img
                    src="{{ $image[$locale ?? 'en'] ?? '' }}"
                    class="img-fluid"
                    alt="{{ $name[$locale ?? 'en'] ?? '' }}" />
                @endif
              </div>
            </div>

            <div class="col-lg-7">
              <h3 class="modal-title" id="exampleModalLabel">
                {{ $name[$locale ?? 'en'] ?? '' }} <span>{{ $text[$locale ?? 'en'] ?? '' }}</span>
              </h3>
              <p>{!! $description[$locale ?? 'en'] ?? '' !!}</p>
            </div>
          </div>
        </div>

        @if ( isset($features[$locale ?? 'en']) && count($features[$locale ?? 'en']) > 0 )
        <div 
          class="g-4 mx-0 p-4 row row-cols-2 row-cols-sm-3 row-cols-lg-6 text-center justify-content-center aiIcons">

          @foreach ($features[$locale ?? 'en'] as $f)
            @include('web.pages.what-riaas.components.cards.products.feature-card', $f)
          @endforeach
          
        </div>
        @endif
        
      </div>
    </div>
  </div>
</div>
@endif