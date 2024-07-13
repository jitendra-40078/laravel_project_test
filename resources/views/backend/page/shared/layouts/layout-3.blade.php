{{-- Layout 1 - Image | Header | Description | Link --}}
<div class="row g-3">
  <div class="col-12" id="{{ $sectionId }}Cards">

    <div class="accordion" id="{{ $sectionId }}Tree">
      
      @if ( is_array($sectionData) && !empty($sectionData) )
        @foreach ($sectionData as $element)
          @php
            array_push($elements, $counter)
          @endphp

          <div
            id="{{ $sectionId }}-card_{{ $counter }}" 
            class="accordion-item" 
            data-id="{{ $counter }}" 
            data-section="{{ $sectionId }}">
          
            <h2
              id="heading{{ $sectionId.$counter }}" 
              class="accordion-header d-flex justify-content-between align-items-center">

              <button 
                type="button"
                class="accordion-button collapsed" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapse{{ $sectionId.$counter }}" 
                aria-expanded="false" 
                aria-controls="collapse{{ $sectionId.$counter }}">
 
                <a 
                  href="javascript:;"
                  class="ms-auto btn-outline-primary my-handle">
                  <i class="bi bi-arrows-move"></i>
                </a>

                <span class="accordion-title">{{ $element['head'] ?? '' }}</span>
              
                <a 
                  href="javascript:;"
                  class="ms-auto btn-outline-danger removeRowBtn" 
                  data-count="{{ $counter }}"
                  data-section="{{ $sectionId }}">
                  <i class="bi bi-trash-fill"></i>
                </a>
              </button>
            </h2>

            <div 
              id="collapse{{ $sectionId.$counter }}" 
              class="accordion-collapse collapse" 
              aria-labelledby="heading{{ $sectionId.$counter }}" 
              data-bs-parent="#{{ $sectionId }}Tree">
              
              <div class="accordion-body">
                <div class="row g-3">
                  
                  @include('backend.partials.media-selector', [
                    'sectionName' => "{$sectionId}ImageR{$counter}",
                    'sectionLabel' => 'Image',
                    'sectionValue' => $element['image'] ?? ''
                  ])

                  @include('backend.partials.inputs.text', [
                    'wrapperClass' => 'col-12',
                    'customClasses' => 'accordion-header-input',
                    'inputLabel' => 'Header',
                    'inputId' => "{$sectionId}HeadR{$counter}",
                    'placeHolder' => 'Enter heading',
                    'value' => $element['head'] ?? ''
                  ])

                  <div class="col-12">
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th scope="col" width="30%">Icon</th>
                          <th scope="col" width="70%">Text</th>
                        </tr>
                      </thead>

                      <tbody>
                        @for ($i=1; $i<=3; $i++)
                          <tr>
                            <td>
                              @include('backend.partials.media-selector', [
                                'wrapperClass' => 'col-12',
                                'sectionName' => "{$sectionId}IconR{$counter}C{$i}",
                                'sectionLabel' => '',
                                'sectionValue' => $element['cards'][$i-1]['icon'] ?? ''
                              ])
                            </td>
                            <td>
                              @include('backend.partials.inputs.text', [
                                'wrapperClass' => 'col-12',
                                'inputLabel' => '',
                                'inputId' => "{$sectionId}TextR{$counter}C{$i}",
                                'placeHolder' => 'Enter text',
                                'value' => $element['cards'][$i-1]['text'] ?? ''
                              ])
                            </td>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

          @php
            $counter++
          @endphp
        @endforeach
      @endif
    </div>

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