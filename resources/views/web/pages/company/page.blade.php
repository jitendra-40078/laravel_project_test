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

  @include('web.pages.company.components.banner', $pageData->content['banner'] ?? [])

  @include('web.pages.company.components.section-2', $pageData->content['section2'] ?? [])

  @include('web.pages.company.components.section-3', $pageData->content['section3'] ?? [])

  @include('web.pages.company.components.section-4', $pageData->content['section4'] ?? [])

  @include('web.pages.company.components.section-5', $pageData->content['section5'] ?? [])

</main>


@endsection

@section('webpagescripts')
<script>


const yearSwiper = new Swiper(".yearSwiper", {
    slidesPerView: 3,
    spaceBetween: 0,
    loop: false,
    speed: 1000,
    centeredSlides: true,
    slideToClickedSlide: true,
    direction: "vertical",
  });

  const milestoneSwiper = new Swiper(".milestoneSwiper", {
    slidesPerView: 1.2,
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      575: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      991: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });

  $(".hide").hide();

  const a = $(".hide:first").attr("data-fillter");

  $(`[data-fillter='${a}']`).show();

  $(".yearSwiper .swiper-slide").click(function () {
    var dataTitle = $(this).attr("data-title");
    $(".hide").hide();
    $(`[data-fillter='${dataTitle}']`).show();
    swiper.updateSlides();
    swiper.updateProgress();
    swiper.updateSlidesClasses();
    swiper.slideTo(0);
    swiper.scrollbar.updateSize();
  });

  $(".yearList li").click(function () {
    var $this = $(this);
    $this.addClass("active");
    $this.siblings("li").removeClass("active");
    $this.insertBefore($this.siblings(":eq(0)"));
    var dataTitle = $(this).attr("data-title");
    $(".hide").hide();
    $(`[data-fillter='${dataTitle}']`).show();
  });
  
  var leadershipSwiper;
  function swiperCard() {
    if (window.innerWidth <= 768) {
      leadershipSwiper = new Swiper(".leadershipSwiper", {
      slidesPerView: 1,
      slidesToScroll: 1,
      spaceBetween: 30,
      loop: true,
      speed: 1000,
      autoplay: true,
      pagination: {
          el: ".swiper-pagination",
        },
    });
    } else if (init) {
      leadershipSwiper.destroy();
    }
  }
  swiperCard();
  window.addEventListener("resize", swiperCard);

  // const leadershipSwiper = new Swiper(".leadershipSwiper", {
  //   slidesPerView: 1.2,
  //   spaceBetween: 30,
  //   loop: true,
  //   speed: 1000,
  //   autoplay: true,

  //   breakpoints: {
  //     420: {
  //       slidesPerView: 2.2,
  //       spaceBetween: 30,
  //     },
  //     991: {
  //       slidesPerView: 3.2,
  //       spaceBetween: 30,
  //     },
  //     1280: {
  //       slidesPerView: 4,
  //       spaceBetween: 30,
  //     },
  //   },
  // });

  

</script>
@endsection