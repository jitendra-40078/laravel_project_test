{{-- Layout 1 - Image | Header | Description | Link --}}
<div class="row g-3">
  <div class="col-12">
    <table class="table mb-0" id="{{ $sectionId }}Cards">

      <thead>
        <tr>
          <th scope="col" style="width:1%">&nbsp;</th>
          <th scope="col" style="width:28%">Head</th>
          <th scope="col" style="width:70%">Text</th>
          <th scope="col" style="width:1%">&nbsp;</th>
        </tr>
      </thead>

      <tbody class="table-cards" id="{{ $sectionId }}Tree">
        @if ( is_array($sectionData) && !empty($sectionData) )
          @foreach ($sectionData as $element)
            @php
              array_push($elements, $counter)
            @endphp
            
            <tr 
              id="{{ $sectionId }}-card_{{ $counter }}" 
              class="table-card-header"
              data-id="{{ $counter }}"
              data-section="{{ $sectionId }}">

              <td>
                <a 
                  href="javascript:;"
                  class="ms-auto btn-outline-primary my-handle">
                  <i class="bi bi-arrows-move"></i>
                </a>
              </td>
  
              <td>
                @include('backend.partials.inputs.text', [
                  'wrapperClass' => 'col-12',
                  'inputLabel' => '',
                  'inputId' => "{$sectionId}HeadR{$counter}",
                  'placeHolder' => 'Enter heading',
                  'value' => $element['head'] ?? ''
                ])
              </td>
  
              <td>
                @include('backend.partials.inputs.text', [
                  'wrapperClass' => 'col-12',
                  'inputLabel' => '',
                  'inputId' => "{$sectionId}TextR{$counter}",
                  'placeHolder' => 'Enter text',
                  'value' => $element['text'] ?? ''
                ])
              </td>

              <td>
                <a 
                  href="javascript:;"
                  class="btn-outline-danger removeRowBtn" 
                  data-count="{{ $counter }}"
                  data-section="{{ $sectionId }}">
                  <i class="bi bi-trash-fill"></i>
                </a>
              </td>
  
            </tr> 

            @php
              $counter++
            @endphp
          @endforeach
        @endif

      </tbody>
    </table>
  </div>

  @include('backend.partials.inputs.hidden', [
    'inputId' => "{$sectionId}Elements",
    'value' => implode(",", $elements)
  ])

  @include('backend.partials.inputs.hidden', [
    'inputId' => "{$sectionId}Counter",
    'value' => $counter - 1
  ])

  <div class="col-12">
    <button type="button" class="btn btn-primary px-4 addRowBtn" id="{{ $sectionId }}RowBtn" data-section="{{ $sectionId }}">Add Row</button>
  </div>
</div>