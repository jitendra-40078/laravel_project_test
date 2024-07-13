<div class="row g-3">
  @php
    $sectionId = 'contentEn';
    $contentEnElements = [];
    $contentEnCounter = 1;
  @endphp

  <div class="col-12" id="contentEnLayoutBox">
    <div class="row">

      @include('backend.partials.inputs.select', [
        'wrapperClass' => 'col-12 col-md-3',
        'inputLabel' => '',
        'inputId' => 'contentEnLayout',
        'value' => '',
        'inputOptions' => [
          ['id' => 'layout_1', 'name' => 'Head + Text'],
          ['id' => 'layout_2', 'name' => 'Text'],
          ['id' => 'layout_3', 'name' => 'Image']
        ]
      ])
    
      <div class="col-12 col-md-4">
        <button type="button" class="btn btn-primary px-4 addRowBtn" id="{{ $sectionId }}RowBtn" data-section="contentEn">Add Layout</button>
      </div>
    </div>
  </div>

  <div class="col-12" id="{{ $sectionId }}Cards">
    <div class="accordion" id="{{ $sectionId }}Tree">
      
    @if ( isset($content['en']) && is_array($content['en']) && !empty($content['en']) )
      @foreach ($content['en'] as $element)
        @php
          array_push($contentEnElements, $contentEnCounter)
        @endphp

        <div
          id="{{ $sectionId }}-card_{{ $contentEnCounter }}" 
          class="accordion-item" 
          data-id="{{ $contentEnCounter }}" 
          data-section="{{ $sectionId }}">
        
          <h2
            id="heading{{ $sectionId.$contentEnCounter }}" 
            class="accordion-header d-flex justify-content-between align-items-center">

            <button 
              type="button"
              class="accordion-button collapsed" 
              data-bs-toggle="collapse" 
              data-bs-target="#collapse{{ $sectionId.$contentEnCounter }}" 
              aria-expanded="false" 
              aria-controls="collapse{{ $sectionId.$contentEnCounter }}">

              <a 
                href="javascript:;"
                class="ms-auto btn-outline-primary my-handle">
                <i class="bi bi-arrows-move"></i>
              </a>

              @if ( isset($element['layout']) && $element['layout'] === "layout_1" )
                <span class="accordion-title">Layout - Head + Text</span>
              @endif
              
              @if ( isset($element['layout']) && $element['layout'] === "layout_2" )
                <span class="accordion-title">Layout - Text</span>
              @endif

              @if ( isset($element['layout']) && $element['layout'] === "layout_3" )
                <span class="accordion-title">Layout - Image</span>
              @endif
            
              <a 
                href="javascript:;"
                class="ms-auto btn-outline-danger removeRowBtn" 
                data-count="{{ $contentEnCounter }}"
                data-section="{{ $sectionId }}">
                <i class="bi bi-trash-fill"></i>
              </a>
            </button>
          </h2>

          <div 
            id="collapse{{ $sectionId.$contentEnCounter }}" 
            class="accordion-collapse collapse" 
            aria-labelledby="heading{{ $sectionId.$contentEnCounter }}" 
            data-bs-parent="#{{ $sectionId }}Tree">
            
            <div class="accordion-body">
              <div class="row g-3">
                
                @if ( $element['layout'] === 'layout_1' )
                  @include('backend.partials.inputs.hidden', [
                    'inputId' => "{$sectionId}LayoutR{$contentEnCounter}",
                    'value' => $element['layout'] ?? ''
                  ])

                  @include('backend.partials.inputs.text', [
                    'wrapperClass' => 'col-12',
                    'inputLabel' => 'Heading',
                    'inputId' => "{$sectionId}HeadR{$contentEnCounter}",
                    'placeHolder' => 'Enter heading',
                    'value' => $element['head'] ?? ''
                  ])

                  @include('backend.partials.inputs.editor', [
                    'wrapperClass' => 'col-12',
                    'inputLabel' => 'Text',
                    'inputId' => "{$sectionId}TextR{$contentEnCounter}",
                    'value' => $element['text'] ?? '',
                    'enableEditor' => true
                  ])
                @endif

                @if ( $element['layout'] === 'layout_2' )
                  @include('backend.partials.inputs.hidden', [
                    'inputId' => "{$sectionId}LayoutR{$contentEnCounter}",
                    'value' => $element['layout'] ?? ''
                  ])

                  @include('backend.partials.inputs.editor', [
                    'wrapperClass' => 'col-12',
                    'inputLabel' => 'Text',
                    'inputId' => "{$sectionId}TextR{$contentEnCounter}",
                    'value' => $element['text'] ?? '',
                    'enableEditor' => true
                  ])
                @endif

                @if ( $element['layout'] === 'layout_3' )
                  @include('backend.partials.inputs.hidden', [
                    'inputId' => "{$sectionId}LayoutR{$contentEnCounter}",
                    'value' => $element['layout'] ?? ''
                  ])

                  @include('backend.partials.media-selector', [
                    'sectionName' => "{$sectionId}ImageR{$contentEnCounter}",
                    'sectionLabel' => 'Image (1000 x 500 px)',
                    'sectionValue' => $element['image'] ?? ''
                  ])

                  @include('backend.partials.inputs.text', [
                    'wrapperClass' => 'col-12',
                    'inputLabel' => 'Caption',
                    'inputId' => "{$sectionId}CaptionR{$contentEnCounter}",
                    'placeHolder' => 'Enter caption',
                    'value' => $element['caption'] ?? ''
                  ])
                @endif

              </div>
            </div>
          </div>
        </div>

        @php
          $contentEnCounter++
        @endphp
      @endforeach
    @endif

    </div>
  </div>

  @include('backend.partials.inputs.hidden', [
    'inputId' => "{$sectionId}Elements",
    'value' => implode(",", $contentEnElements)
  ])

  @include('backend.partials.inputs.hidden', [
    'inputId' => "{$sectionId}Counter",
    'value' => $contentEnCounter - 1
  ])

</div>