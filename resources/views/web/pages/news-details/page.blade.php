@extends('web.page')

@section('webpagestyles')
  <link rel="stylesheet" href="{{ asset('web/css/innerPage.css') }} ">
@endsection

@section('webpageseo')
  <title>{{ $news->title[$locale] ?? 'Welcome to DareeSoft' }}</title>
  <meta name="description" content="{{ $news->short_description[$locale] ?? '' }}">
@endsection

@section('webpagecontent')
  <main>
  
    @include('web.pages.news-details.components.section-1', $news ?? [] )

    @include('web.pages.news-details.components.section-2', $recommend ?? [] )

    @include('web.pages.partials.newsletter-form', $pageData->content['section3'] ?? [])

  </main>
@endsection

@section('webpagescripts')
<script>
  window.onscroll = function () {
    progressIndicator();
  };

  function progressIndicator() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById("progressBar").style.width = scrolled + "%";
  }

  const newsSwiper = new Swiper(".newsSwiper", {
    slidesPerView: 1,
    spaceBetween: 15,
    speed: 1000,
    loop: true,
    autoplay: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      575: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
    },
  });
</script>
@endsection