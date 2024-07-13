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

  @include('web.pages.news.components.section-1', [
    "data" => $pageData->content['section1'] ?? null,
    "featuredNews" => $featuredNews ?? null
  ])

  @include('web.pages.news.components.section-2', $pageData->content['section1'] ?? null)

  @include('web.pages.partials.newsletter-form', $pageData->content['section3'] ?? [])

</main>

@endsection

@section('webpagescripts')

<script src="{{ asset('web/vendor/news.js') }}"></script>
<script>
  const ftSwiper = new Swiper(".ftSwiper", {
    spaceBetween: 30,
    speed: 1500,
    easing: "cubic-bezier(.25,.25,0,.905)",
    // pauseOnMouseEnter:true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

@endsection