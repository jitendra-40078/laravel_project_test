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

  @include('web.pages.what-riaas.components.banner', $pageData->content['banner'] ?? [])

  @include('web.pages.what-riaas.components.section-2', $pageData->content['section2'] ?? [])

  @include('web.pages.what-riaas.components.section-3', [
    "data" => $pageData->content['section3'] ?? [],
    "products" => $products,
    "productProperties" => $productProperties
  ])

  @include('web.pages.what-riaas.components.section-4', $pageData->content['section4'] ?? [])

  @include('web.pages.what-riaas.components.section-5', $pageData->content['section5'] ?? [])

  @include('web.pages.what-riaas.components.section-6', $pageData->content['section6'] ?? [])

  @if ( 
    isset($pageData->content['section5']['cards']) && 
    is_array($pageData->content['section5']['cards']) && 
    !empty($pageData->content['section5']['cards']) 
  )
    @php
      $section5cardList = [];
      foreach ( $pageData->content['section5']['cards'] as $card ){
        array_push($section5cardList, $card["head"]);
      }
    @endphp

    @include('backend.partials.inputs.hidden', [
      'inputId' => "section5cardList",
      'value' => implode(",", $section5cardList)
    ])
  @endif

</main>

@endsection

@section('webpagescripts')

@if ( isset($products) && count($products) > 2 )
<script>
  const productSwiper = new Swiper(".productSwiperMulti", {
    slidesPerView: 1.1,
    spaceBetween: 15,
    navigation: {
      nextEl: ".product-swiper-button-next",
      prevEl: ".product-swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });
</script>
@else
<script>
  const productSwiper = new Swiper(".productSwiper", {
    slidesPerView: 1.1,
    spaceBetween: 15,
    // loop:true,
    // centeredSlides: true,
    navigation: {
      nextEl: ".product-swiper-button-next",
      prevEl: ".product-swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      991: {
        slidesPerView: "auto",
        spaceBetween: 30,
        // centeredSlides: true,
      },
    },
  });

  // if ($(window).width() > 991) {
  //   $(".productSwiper .swiper-slide ").click(function () {
  //     $(this).addClass("swiper-slide-active");
  //     $(this).siblings(".swiper-slide").removeClass("swiper-slide-active");
  //   });
  // }

  if($(window).width()> 991 ){
    $('.productSwiper .swiper-slide').eq(0).addClass('expand');
    $('.productSwiper .swiper-slide ').click(function(){
      $(this).addClass('expand')
      $(this).siblings('.swiper-slide').removeClass('expand')
    })
  }

  $(".aiIcons").eq(0).addClass("show");

  $(".productSwiper .swiper-slide ").click(function () {
    const active = $(this).index();
    $(".aiIcons").removeClass("show");

    $(".aiIcons").eq(active).addClass("show");
  });

</script>
@endif

<script>
  if ($(window).width() < 991) {
    const platformSwiper = new Swiper(".platformSwiper", {
      slidesPerView: 1.2,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        575: {
          slidesPerView: 2.2,
          spaceBetween: 10,
        },
        991: {
          slidesPerView: 3.2,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      },
    });
  }
</script>

@if ( 
  isset($pageData->content['section5']['cards']) && 
  is_array($pageData->content['section5']['cards']) && 
  !empty($pageData->content['section5']['cards']) 
)
  <script>
    const section5cardList = $("#section5cardList").val();
    const menu = section5cardList ? section5cardList.split(",") : [];

    if( menu.length > 0 ){
      const monitoringSwiper = new Swiper(".monitoringSwiper", {
        slidesPerView: 1,
        spaceBetween: 0,
        speed: 2000,
        autoplay: true,
        pagination: {
          el: ".mon-swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            return (
              '<button class="' + className + '">' + menu[index] + "</button>"
            );
          },
        },
      });
    }
  </script>
@endif

<script>
  $(".workDetailBox").removeClass("active");
  $(`[data-fillter='circularCard-2']`).addClass("active");

  $(".workList li").hover(function () {
    $(this).addClass("active");
    $(this).siblings("li").removeClass("active");
    $(".workDetailBox").removeClass("active");
    var dataTitle = $(this).attr("data-title");
    $(`[data-fillter='${dataTitle}']`).addClass("active");
  });

  $("[data-fillter]").hover(function () {
    $(this).addClass("active");
    $(this).siblings().removeClass("active");
    var dataAttributeValue = $(this).data("fillter");
    var siblingsWithSameAttribute = $(this).siblings(
      '[data-fillter="' + dataAttributeValue + '"]'
    );
    siblingsWithSameAttribute.addClass("active");
    $(".workList li").removeClass("active");
    $('.workList li[data-title="' + dataAttributeValue + '"]').addClass(
      "active"
    );
  });
</script>

@endsection