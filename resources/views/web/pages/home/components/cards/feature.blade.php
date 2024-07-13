@if ($head || $text)
<li class="col-md-6 col-lg-12 mb-3">
  <div class="d-flex align-items-center animateThis slideTop">
    <div class="col-auto no">{{ $counter }}</div>
    <div class="col">
      <span>{{ $head }}</span> {{ $text }} 
    </div>
  </div>
</li>
@endif