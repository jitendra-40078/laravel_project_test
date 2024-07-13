@extends('web.page')

@section('webpagestyles')
<link rel="stylesheet" href="{{ asset('web/css/home.css') }}" />

<style>
  #linesvg {
    position: absolute;
  }
</style>
@endsection

@section('webpageseo')
<title>{{ $pageData->seo['metaTitle'] ?? 'Welcome to DareeSoft' }}</title>
<meta name="description" content="{{ $pageData->seo['metaDescription'] ?? '' }}">
@endsection

@section('webpagecontent')

<main>
  @include('web.pages.home.components.banner', $pageData->content['banner'] ?? [])

  @include('web.pages.home.components.section-2', $pageData->content['section2'] ?? [])

  @include('web.pages.home.components.section-3', $pageData->content['section3'] ?? [])

  @include('web.pages.home.components.section-4', $pageData->content['section4'] ?? [])

  @include('web.pages.home.components.section-5', [
    'testimonials' => $testimonials,
    'section5Data' => $pageData->content['section5'] ?? null
  ])

  @include('web.pages.home.components.section-6', [
    'news' => $news,
    'section6Data' => $pageData->content['section6'] ?? null
  ])

  @include('web.pages.home.components.section-7', $pageData->content['section7'] ?? [])

</main>

@endsection

@section('webpagescripts')

<script>
  $(".count").each(function () {
    $(this)
      .prop("Counter", 0)
      .animate(
        {
          Counter: $(this).text(),
        },
        {
          duration: 2000,
          easing: "swing",
          step: function (now) {
            $(this).text(Math.ceil(now));
          },
          complete: function () {
            $(".count").hide();
            $(".hazardCountText").show();
          }
        }
      );
  });

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
        slidesPerView: 1.9,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 2.4,
        spaceBetween: 35,
      },
    },
  });

  const testimonialSwiper = new Swiper(".testimonialSwiper", {
    slidesPerView: 1.2,
    spaceBetween: 15,
    loop: true,
    speed: 1000,
    autoplay: true,
    // pagination: {
    //   el: ".test-swiper-pagination",
    //   clickable: true
    // },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      1280: {
        slidesPerView: 2,

        spaceBetween: 30,
      },
      1480: {
        slidesPerView: 3,

        spaceBetween: 30,
      },
    },
  });
</script>

<script>
  // for another helper function that calculates the exact progress value along a motion path where it'll hit the center of the provided target on the given axis ("y" by default), see https://codepen.io/GreenSock/pen/BaPdrKM
  gsap.registerPlugin(MotionPathPlugin, ScrollTrigger);

  gsap.set("#motionSVG", { scale: 1, autoAlpha: 1 });
  gsap.set("#tractor", { transformOrigin: "50% 50%" });
  let rotateTo = gsap.quickTo("#tractor", "rotation"),
  prevDirection = 0;

  gsap.to("#motionSVG", {
    scrollTrigger: {
      trigger: "#motionPath",
      start: "top center",
      end: () =>
        "+=" +
        document.querySelector("#motionPath").getBoundingClientRect()
          .height,
      scrub: 1,
      // duration: 5000,
      markers: false,
    },
    duration: 50000,
    ease: pathEase("#motionPath"), // a custom ease that helps keep the tractor centered
    immediateRender: true,
    motionPath: {
      path: "#motionPath",
      align: "#motionPath",
      alignOrigin: [0.5, 0.5],
    },
  });

  // helper function that returns and ease that bends time to ensure the tractor stays relatively centered. Requires MotionPathPlugin of course
  function pathEase(path, axis = "y", precision = 1) {
    let rawPath = MotionPathPlugin.cacheRawPathMeasurements(
        MotionPathPlugin.getRawPath(gsap.utils.toArray(path)[0]),
        Math.round(precision * 12)
      ),
      useX = axis === "x",
      start = rawPath[0][useX ? 0 : 1],
      end =
        rawPath[rawPath.length - 1][
          rawPath[rawPath.length - 1].length - (useX ? 2 : 1)
        ],
      range = end - start,
      l = Math.round(precision * 200),
      inc = 1 / l,
      positions = [0],
      a = [],
      minIndex = 0,
      getClosest = (p) => {
        while (positions[minIndex] <= p && minIndex++ < l) {}
        a.push(
          ((p - positions[minIndex - 1]) /
            (positions[minIndex] - positions[minIndex - 1])) *
            inc +
            minIndex * inc
        );
      },
      i = 1,
      p,
      v;
    for (; i < l; i++) {
      p = i / l;
      v = MotionPathPlugin.getPositionOnPath(rawPath, p)[axis];
      positions[i] = (v - start) / range;
    }
    positions[l] = 1;
    for (i = 0; i < l; i++) {
      getClosest(i / l);
    }
    a.push(1);
    return (p) => {
      let i = p * l,
        s = a[i | 0];
      return i ? s + (a[Math.ceil(i)] - s) * (i % 1) : 0;
    };
  }
</script>

<script>
  function setCookie(name, value, days) {
    let expires = "";
    if (days) {
      let date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  }

  function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for(let i=0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }

    return null;
  }

  $(document).ready(function () {
    
    $(".hazardCountText").hide();

    // const isOpened = sessionStorage.getItem("openedHomePopup");
    
    // if( !isOpened ){
    //   $("#dareesoftPopup").modal("show");
    // }

    // $('#dareesoftPopup').on('hidden.bs.modal', function () {
    //   sessionStorage.setItem("openedHomePopup", true);
    // })

    if (!getCookie('hidePopup')) {
      $("#dareesoftPopup").modal("show");
    }

    $('#dareesoftPopup').on('hidden.bs.modal', function () {
      const dontShowAgain = $('#dontShowAgain').is(":checked");

      if(dontShowAgain) {
        setCookie('hidePopup', 'true', 1); // Set the cookie for 1 day
      }
    })

  });
</script>
@endsection