<div class="{{ $wrapperClass }}">

  @if (isset($inputLabel) && $inputLabel)
  <label class="form-label">{{ $inputLabel }}</label>
  @endif

  <textarea 
    id="{{ $inputId }}"
    name="{{ $inputId }}"
    rows="5"
    class="form-control {{ $enableEditor ? 'editor' : '' }}">{{ $value }}</textarea>
    
  @if (isset($hintText) && $hintText)
  <label class="mt-2">{{ $hintText }}</label>
  @endif
  
  <label for="{{ $inputId }}" class="invalid-feedback"></label>
</div>