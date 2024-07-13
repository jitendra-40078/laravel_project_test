<div class="{{ $wrapperClass ?? 'col-12 col-md-4' }}">
  <div class="uploadPic">

    @if (isset($sectionLabel) && $sectionLabel)
    <label class="form-label p-1 d-block">{{ $sectionLabel }}</label>
    @endif

    <input
      type="hidden"
      id="{{ $sectionName ?? '' }}"
      name="{{ $sectionName ?? '' }}" 
      value="{{ $sectionValue ?? '' }}" />
  
    <!-- input -->
    <div 
      class="{{ $sectionName ?? '' }}MediaAdd" 
      @if (isset($sectionValue) && $sectionValue)
      style="display:none"
      @endif
    >
      <button
        type="button"
        class="btn btn-secondary mb-2 col-12" 
        id="mediaLibraryBtn" 
        data-placeholder="{{ $sectionName ?? '' }}"
        >
        <i class="bi bi-upload"></i> {{ $mediaUploadBtnText ?? 'Add Image' }}
      </button>
      <label for="{{ $sectionName ?? '' }}" class="invalid-feedback"></label>
  
      @if ( isset($mediaFormats) || isset($mediaSize) || isset($mediaDimensions) )
      <label class="">
        <ul>
          @isset($mediaFormats)
            <li>Accepted formats: {{ $mediaFormats ?? '' }}</li>
          @endisset
          @isset($mediaSize)
            <li>Size: {{ $mediaSize ?? '' }} MB</li>
          @endisset
          @isset($mediaDimensions)
            <li>Dimension (W x H): {{ $mediaDimensions ?? '' }}</li>
          @endisset
        </ul>
      </label>
      @endif
    </div>
  
    <!-- preview-->
    <div 
      class="{{ $sectionName ?? '' }}MediaPreview"
      @if (isset($sectionValue) && !$sectionValue)
      style="display:none"
      @endif
    >
      @php
        $extension = pathinfo($sectionValue, PATHINFO_EXTENSION);
        $thumbnail = '';
        switch($extension){
          case "mp3" : $thumbnail = '/backend/assets/images/audio.png'; break;
          case "mp4" : $thumbnail = '/backend/assets/images/video.png'; break;
          case "docx" : $thumbnail = '/backend/assets/images/doc.png'; break;
          case "xlsx" : $thumbnail = '/backend/assets/images/xls.png'; break;
          case "pptx" : $thumbnail = '/backend/assets/images/ppt.png'; break;
          case "pdf" : $thumbnail = '/backend/assets/images/pdf.png'; break;
          case "zip" : $thumbnail = '/backend/assets/images/zip.png'; break;
          default: $thumbnail = '/'.$sectionValue; break;
        } 
      @endphp
      
      <div class="media-preview-wrap">
        <div class="d-flex media-box"><img src="{{ $thumbnail ?? '' }}" class="img-fluid" width="100px"></div>
  
        <div class="row mx-0 pt-4 justify-content-center align-items-center iconDiv">
  
          <div class="col-auto">
            <div class="icon" id="mediaRemoveBtn" data-placeholder="{{ $sectionName ?? '' }}">
            <i class="bi bi-trash3-fill"></i>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>