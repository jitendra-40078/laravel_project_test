@extends('web.page')

@section('webpagestyles')
  <link rel="stylesheet" href="{{ asset('web/css/innerPage.css') }} ">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
@endsection

@section('webpageseo')
  <title>{{ $blog->title[$locale] ?? 'Welcome to DareeSoft' }}</title>
  <meta name="description" content="{{ $blog->short_description[$locale] ?? '' }}">
@endsection

@section('webpagecontent')

<main>
  @include('web.pages.blog-details.components.section-1', [
    'data' => $blog ?? null,
    'popularBlogs' => $popularBlogs,
    'section' => $pageData->content['section1']
  ])

  @include('web.pages.partials.newsletter-form')
</main>
@endsection

@section('webpagescripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>


Fancybox.bind("[data-fancybox]", {
      
    });


  window.onscroll = function () {
    progressIndicator();
  };

  function progressIndicator() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById("progressBar").style.width = scrolled + "%";
  }

  if ($(window).width() > 991) {
    // sticky effect
    var stickyElement = $("[data-sticky_column]");
    if (stickyElement.length > 0) {
      stickyElement.stick_in_parent({
        parent: "[data-sticky_parent]",
        offset_top: 120,
      });
    }
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