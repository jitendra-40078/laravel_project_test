<div class="{{ $wrapperClass }}">
  
  @if (isset($inputLabel) && $inputLabel)
  <label class="form-label">{{ $inputLabel }}</label>
  @endif
  
  <select 
    id="{{ $inputId }}"
    name="{{ $inputId }}"
    class="form-control {{ $customClasses ?? '' }}"
  >
  
  <option value="">{{ $placeholder ?? 'Select option' }}</option>

  @if ( is_array($inputOptions) && !empty($inputOptions) )
  @foreach ($inputOptions as $option)
    <option 
      value="{{ $option['id'] ?? '' }}" 
      {{ $option['id'] === $value ? 'selected' : '' }}
    >
      {{ $option['name'] }}
    </option>
  @endforeach
  @endif

  </select>

  <label for="{{ $inputId }}" class="invalid-feedback"></label>  
</div>