{{-- @include('backend.page.shared.layouts.layout-3', [
  "sectionId" => "homeSection4",
  "sectionData" => $cards ?? [],
  "elements" => [],
  "counter" => 1
]) --}}

<div class="row g-3">
  <div class="col-12" id="{{ $sectionId }}Cards">

    <div class="accordion" id="{{ $sectionId }}Tree">
      
      @if ( is_array($sectionData) && !empty($sectionData) )
        @for ( $i=1; $i<=3; $i++ )
          @php
            array_push($elements, $i)
          @endphp

          <div
            id="{{ $sectionId }}-card_{{ $i }}" 
            class="accordion-item" 
            data-id="{{ $i }}" 
            data-section="{{ $sectionId }}">

            <h2
              id="heading{{ $sectionId.$i }}" 
              class="accordion-header d-flex justify-content-between align-items-center">

              <button 
                type="button"
                class="accordion-button collapsed" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapse{{ $sectionId.$i }}" 
                aria-expanded="false" 
                aria-controls="collapse{{ $sectionId.$i }}">

                <a 
                  href="javascript:;"
                  class="ms-auto btn-outline-primary my-handle">
                  <i class="bi bi-arrows-move"></i>
                </a>

                <span class="accordion-title">{{ $sectionData[$i-1]['head'] ?? '' }}</span>
              
              </button>
            </h2>

            <div 
              id="collapse{{ $sectionId.$i }}" 
              class="accordion-collapse collapse" 
              aria-labelledby="heading{{ $sectionId.$i }}" 
              data-bs-parent="#{{ $sectionId }}Tree">
              
              <div class="accordion-body">
                <div class="row g-3">
                  
                  @include('backend.partials.media-selector', [
                    'sectionName' => "{$sectionId}ImageR{$i}",
                    'sectionLabel' => 'Image (600 x 400 px)',
                    'sectionValue' => $sectionData[$i-1]['image'] ?? ''
                  ])

                  @include('backend.partials.inputs.text', [
                    'wrapperClass' => 'col-12 col-md-8',
                    'customClasses' => 'accordion-header-input',
                    'inputLabel' => 'Header',
                    'inputId' => "{$sectionId}HeadR{$i}",
                    'placeHolder' => 'Enter heading',
                    'value' => $sectionData[$i-1]['head'] ?? ''
                  ])

                  <div class="col-12">
                    @for ($j=1; $j<=3; $j++)
                      <div
                        id="{{ $sectionId }}-card_{{ $i.$j }}" 
                        class="accordion-item" 
                        data-id="{{ $i.$j }}" 
                        data-section="{{ $sectionId }}">
                    
                        <h2
                          id="heading{{ $sectionId.$i.$j }}" 
                          class="accordion-header d-flex justify-content-between align-items-center">
                      
                          <button 
                            type="button"
                            class="accordion-button collapsed" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapse{{ $sectionId.$i.$j }}" 
                            aria-expanded="false" 
                            aria-controls="collapse{{ $sectionId.$i.$j }}">
                      
                            {{-- <a 
                              href="javascript:;"
                              class="ms-auto btn-outline-primary my-handle">
                              <i class="bi bi-arrows-move"></i>
                            </a> --}}
                      
                            <span class="accordion-title">{{ $sectionData[$i-1]['cards'][$j-1]['text'] ?? '' }}</span>
                            
                          </button>
                        </h2>
                      
                        <div 
                          id="collapse{{ $sectionId.$i.$j }}" 
                          class="accordion-collapse collapse" 
                          aria-labelledby="heading{{ $sectionId.$i.$j }}" 
                          data-bs-parent="#{{ $sectionId.$i }}SubTree">
                          
                          <div class="accordion-body">
                            <div class="row g-3">
                              
                              @include('backend.partials.media-selector', [
                                'sectionName' => "{$sectionId}IconR{$i}C{$j}",
                                'sectionLabel' => 'Icon (200 x 200 px)',
                                'sectionValue' => $sectionData[$i-1]['cards'][$j-1]['icon'] ?? ''
                              ])

                              @include('backend.partials.inputs.text', [
                                'wrapperClass' => 'col-12 col-md-8',
                                'inputLabel' => 'Text',
                                'inputId' => "{$sectionId}TextR{$i}C{$j}",
                                'placeHolder' => 'Enter text',
                                'value' => $sectionData[$i-1]['cards'][$j-1]['text'] ?? ''
                              ])

                            </div>
                          </div>

                        </div>
                      </div>
                    @endfor
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        @endfor
      @endif
    </div>

  </div>

  @include('backend.partials.inputs.hidden', [
    'inputId' => "{$sectionId}Elements",
    'value' => implode(",", $elements)
  ])

  @include('backend.partials.inputs.hidden', [
    'inputId' => "{$sectionId}Counter",
    'value' => $i-1
  ])

</div>