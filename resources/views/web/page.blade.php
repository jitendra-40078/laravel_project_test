<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#AD181F" />
    
    <link rel="shortcut icon" href="{{ asset('web/images/favIcon.png') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/common.css') }}" />

    @if ( isset($locale) && $locale === "en" )
      <link rel="stylesheet" href="{{ asset('web/css/en-font.css') }}" />
    @else
      <link rel="stylesheet" href="{{ asset('web/css/kr-font.css') }}" />
    @endif

    @yield("webpagestyles")

    <style>
      #linesvg {
        position: absolute;
      }

      .invalid-feedback{
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: .875em;
        color: #dc3545;
      }

      #loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        z-index: 1000;
        display: none;
      }

      #loader {
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        width: 50px;
        height: 50px;
        margin: -25px 0 0 -25px;
        border-radius: 50%;
        border: 5px solid transparent;
        border-top-color: #3498db;
        animation: spin 2s linear infinite;
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
    </style>

    @yield("webpageseo")
  </head>
  
  <body>

    @include("web.layout.header")

    @yield("webpagecontent")

    @include("web.layout.footer")

    <script> const BASE_URL = "{{ url('') }}"; </script>
    <script> const locale = "{{ $locale ?? 'en' }}"; </script>

    {{-- common scripts --}}
    <script src="{{ asset('web/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/js/swiper-bundle.min.js') }}"></script>

    {{-- home page --}}
    @if(request()->route()->getName() == 'web.homePage')
    <script src="{{ asset('web/js/particles.js') }}"></script>
    <script src="{{ asset('web/js/app.js') }}"></script>
    <script src="{{ asset('web/js/gsap.min.js') }}"></script>
    <script src="{{ asset('web/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('web/js/MotionPathPlugin.min.js') }}"></script>    
    @endif

    @if( in_array(request()->route()->getName(), ['web.whatriaasPage', 'web.useCasePage', 'web.blogsPage', 'web.blogsDetailsPage']) )
    <script src="{{ asset('web/js/sticky.min.js') }}"></script> 
    @endif

    <script src="{{ asset('web/js/scripts.js') }}"></script>

    @if( in_array(request()->route()->getName(), ['web.newsDetails', 'web.blogsDetailsPage']) )
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6593d8d998185400190a03bc&product=inline-share-buttons' async='async'></script>
    @endif
    
    @if( in_array(request()->route()->getName(), ['web.contactPage', 'web.newsPage', 'web.newsDetails', 'web.careerPage', 'web.blogsPage', 'web.blogsDetailsPage']) )
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script src="{{ asset('web/plugins/sweetalert/js/sweetalert2.all.min.js') }}"></script>
      <script src="{{ asset('web/vendor/http.js') }}"></script>
    @endif

    @if( in_array(request()->route()->getName(), ['web.newsPage', 'web.newsDetails', 'web.careerPage', 'web.blogsDetailsPage']) )
    <script>
      $(document).ready(function() {
        $("#newsletterForm").on("submit",function(e){
          e.preventDefault();        
          
          const formdata = new FormData(this);
          postForm('newsletterForm', 'api/web/newsletter/store', formdata);
        });
      });
    </script>
    @endif

    @yield("webpagescripts")

  </body>
</html>