<div class="row g-3">
  <div class="col-12">
    <table class="table mb-0">
      <thead>
        <tr>
          <th scope="col" width="20%">Property</th>
          <th scope="col" width="80%">Value</th>
        </tr>
      </thead>

      <tbody>
        @if ( isset($productProperties) && count($productProperties) > 0)
          @foreach ($productProperties as $p)
            <tr>
              <td>{{ $p->nameEn }}</td>
              <td>
                @include('backend.partials.inputs.text', [
                  'wrapperClass' => 'col-12',
                  'inputLabel' => '',
                  'inputId' => "{$p->code}Kr",
                  'placeHolder' => 'Enter text',
                  'value' => $properties[$p->code]["kr"] ?? ''
                ])
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>