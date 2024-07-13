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

  @include('web.pages.blogs.components.section-1', $pageData->content['section1'] ?? [])

  @include('web.pages.blogs.components.section-2', $pageData->content['section1'] ?? [])

  @include('web.pages.blogs.components.section-3', $pageData->content['section1'] ?? [])

</main>

@endsection

@section('webpagescripts')
  <script src="{{ asset('web/vendor/blog.js') }}"></script>

  <script>

    function initializeStickyScript(){
      if ($(window).width() > 991) {
        const stickyElement = $("[data-sticky_column]");
        if (stickyElement.length > 0) {
          stickyElement.stick_in_parent({
            parent: "[data-sticky_parent]",
            offset_top: 120,
          });
        }
      }
    }

    const serviceSwiper = new Swiper(".serviceSwiper", {
      slidesPerView: 1.2,
      spaceBetween: 10,
      speed: 1000,
      loop: true,
      autoplay: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        575: {
          slidesPerView: 1.3,
        },
        991: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      },
    });
  </script>

  <script>
    $(document).ready(function () {
      $(".latestDetails").slice(0, 4).show();
      $(".loadmoreBtn").on("click", function (e) {
        e.preventDefault();
        $(".latestDetails:hidden").slice(0, 1).slideDown();
        if ($(".latestDetails:hidden").length == 0) {
          $(".loadmoreBtn").hide();
        }
      });
    });
  </script>
@endsection