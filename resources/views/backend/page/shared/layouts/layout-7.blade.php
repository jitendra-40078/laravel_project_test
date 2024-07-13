{{-- Layout 1 - Image | Header | Description | Link --}}
<div class="row g-3">
  <div class="col-12" id="{{ $sectionId }}Cards">
    <div class="accordion" id="{{ $sectionId }}Tree">
      
      @for ( $i=1; $i<=3; $i++ )
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

            {{-- <a 
              href="javascript:;"
              class="ms-auto btn-outline-primary my-handle">
              <i class="bi bi-arrows-move"></i>
            </a> --}}

            <span class="accordion-title">{{ $sectionData[$i-1]['title'] ?? '' }}</span>
            
          </button>
        </h2>

        <div 
          id="collapse{{ $sectionId.$i }}" 
          class="accordion-collapse collapse" 
          aria-labelledby="heading{{ $sectionId.$i }}" 
          data-bs-parent="#{{ $sectionId }}Tree">
          
          <div class="accordion-body">

            <div class="row g-3 accordion" id="{{ $sectionId.$i }}SubTree">
            
              @include('backend.partials.inputs.text', [
                'wrapperClass' => 'col-12',
                'customClasses' => 'accordion-header-input',
                'inputLabel' => 'Section Title',
                'inputId' => "{$sectionId}TitleR{$i}",
                'placeHolder' => 'Enter heading',
                'value' => $sectionData[$i-1]['title'] ?? ''
              ])

              <div class="col-12">
                @for ( $j=1; $j<= ($i==3?1:2); $j++)
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
                  
                        <span class="accordion-title">{{ $sectionData[$i-1]['cards'][$j-1]['head'] ?? '' }}</span>
                        
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
                            'sectionName' => "{$sectionId}IconBlueR{$i}C{$j}",
                            'sectionLabel' => 'Icon (blue color) (100 x 100 px)',
                            'sectionValue' => $sectionData[$i-1]['cards'][$j-1]['iconBlue'] ?? ''
                          ])

                          @include('backend.partials.media-selector', [
                            'sectionName' => "{$sectionId}IconWhiteR{$i}C{$j}",
                            'sectionLabel' => 'Icon (white color) (100 x 100 px)',
                            'sectionValue' => $sectionData[$i-1]['cards'][$j-1]['iconWhite'] ?? ''
                          ])

                          @include('backend.partials.inputs.text', [
                            'wrapperClass' => 'col-12',
                            'customClasses' => 'accordion-header-input',
                            'inputLabel' => 'Heading',
                            'inputId' => "{$sectionId}HeadR{$i}C{$j}",
                            'placeHolder' => 'Enter heading',
                            'value' => $sectionData[$i-1]['cards'][$j-1]['head'] ?? ''
                          ])

                          @include('backend.partials.inputs.editor', [
                            'wrapperClass' => 'col-12',
                            'inputLabel' => 'Text',
                            'inputId' => "{$sectionId}TextR{$i}C{$j}",
                            'value' => $sectionData[$i-1]['cards'][$j-1]['text'] ?? '',
                            'enableEditor' => true
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

    </div>
  </div>
</div>