@extends('web.page')

@section('webpagestyles')
<link rel="stylesheet" href="{{ asset('web/css/innerPage.css')}} ">
@endsection

@section('webpageseo')
<title>{{ $pageData->seo['metaTitle'] ?? 'Welcome to DareeSoft' }}</title>
<meta name="description" content="{{ $pageData->seo['metaDescription'] ?? '' }}">
@endsection

@section('webpagecontent')
<main>
  
  <!-- Loader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
  </div>

  @include('web.pages.contact.components.section-1', $pageData->content['section1'] ?? [])

  @include('web.pages.contact.components.section-2', $pageData->content['section2'] ?? [])

</main>
@endsection

@section('webpagescripts')
<script>
  $(document).ready(function() {
    $("#contactEnquiryForm").on("submit",function(e){
      e.preventDefault();        
      
      const formdata = new FormData(this);
      postForm('contactEnquiryForm', 'api/web/contact/store', formdata);
    });
  });
</script>
@endsection