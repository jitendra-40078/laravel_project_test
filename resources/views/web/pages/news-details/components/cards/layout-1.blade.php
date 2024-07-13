@if ( isset($head) && $head )
<h4>{{ $head }}</h4>
@endif

@if ( isset($text) && $text )
{!! $text !!}    
@endif