@if ( isset($products) && isset($productProperties) )
<div
  class="modal fade modal-xl"
  id="diffModal"
  tabindex="-1"
  aria-labelledby="diffModalLabel"
  aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        {{-- <h4 class="modal-title text-center" id="diffModalLabel">ARA 20 vs. ARA 20+</h4> --}}
        
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close">
        </button>

        @if ( count($products) > 0 && count($productProperties) > 0 )
        <div class="table-responsive">
          <table class="table table-bordered difTable">

            <thead>
              <tr>
                <th>Items</th>
                @foreach ($products as $p)
                  <th>{{ $p->name[$locale ?? '']}}</th>
                @endforeach
              </tr>
            </thead>

            <tbody>
              @foreach ($productProperties as $pp)
                <tr>
                  <td>{{ $locale === 'en' ? $pp->nameEn : $pp->nameKr }}</td>
                  @foreach ($products as $p)
                    <td>{{ $p->properties[$pp->code][$locale ?? 'en'] }}</td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>

          </table>
        </div>          
        @endif

      </div>
    </div>
  </div>
</div>
@endif