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

  @include('web.pages.use-case.components.banner', $pageData->content['banner'] ?? [])

  @include('web.pages.use-case.components.section-2', $pageData->content['section2'] ?? [])

  @include('web.pages.use-case.components.section-3', [
    'section3Data' => $pageData->content['section3'] ?? null,
    'casestudies' => $casestudyData
  ])

</main>

@endsection

@section('webpagescripts')
<script>
  if ($(window).width() > 991) {
    // sticky effect
    var stickyElement = $("[data-sticky_column]");
    if (stickyElement.length > 0) {
      stickyElement.stick_in_parent({
        parent: "[data-sticky_parent]",
        offset_top: 150,
      });
    }
  }
</script>
@endsection