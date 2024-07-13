<div class="{{ $wrapperClass }}">
  
  @if (isset($inputLabel) && $inputLabel)
  <label class="form-label">{{ $inputLabel }}</label>
  @endif
  
  <input 
    type="{{ $inputType ?? 'text' }}"
    id="{{ $inputId }}"
    name="{{ $inputId }}"
    class="form-control {{ $customClasses ?? '' }}"
    placeholder="{{ $placeHolder ?? '' }}"

    @if (isset($disabled) && $disabled)
    disabled
    @endif

    @if (in_array($inputId, ['displayOrder']))
    min="1"
    @endif
    value="{{ $value }}" >

  @if (isset($hintText) && $hintText)
  <label class="mt-2">{{ $hintText }}</label>
  @endif

  <label for="{{ $inputId }}" class="invalid-feedback"></label>  
</div>