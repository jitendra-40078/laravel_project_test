<!DOCTYPE html>
<html lang="en" class="semi-dark">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="icon"
      href="{{ asset('backend/assets/images/favIcon.png') }}"
      type="image/png"
    />

    @include('backend.template.dashboard.includes.styles')
    @include('backend.template.dashboard.includes.scripts')
    
    <script> const BASE_URL = "{{ url('') }}"; </script>

    <title>{{ $pageTitle ?? 'CMS Dashboard' }}</title>

    @if (isset($isListPage) && $isListPage)
    <style>
      .dataTables_wrapper td {
        white-space: normal; /* Allows text to wrap */
        word-wrap: break-word; /* Breaks long words if necessary */
      }
    </style>
    @endif
    
    @if (isset($isFormPage ) && $isFormPage )
    <style>
      .accordion-button.collapsed{
        background-color: #c2f2d7;
        border: 1px solid green;
      }

      .media-preview-wrap .media-box{
        background-color: #c9e5ff;
      }
    </style>
    @endif

  </head>

  <body>
    <!--start wrapper-->
    <div class="wrapper">
      
      <!-- Loader -->
      <div id="loader-wrapper">
        <div id="loader"></div>
      </div>

      <!--start top header-->
      @include('backend.template.dashboard.includes.header')
      <!--end top header-->

      <!--start sidebar -->
      @include('backend.template.dashboard.includes.sidebar')
      <!--end sidebar -->

      <!--start content-->
      @yield('dashboardContent')
      <!--end page main-->

      <!--start library -->
      @if (isset($enableMediaLibrary) && $enableMediaLibrary )
        @include('backend.template.dashboard.includes.library-popup')
      @endif
      <!--end library -->

      <!--start overlay-->
      <div class="overlay nav-toggle-icon"></div>
      <!--end overlay-->

      <!--Start Back To Top Button-->
      <a href="javaScript:;" class="back-to-top"
        ><i class="bx bxs-up-arrow-alt"></i
      ></a>
      <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->

    <script>
      $(document).ready(function() {
        $('#loader-wrapper').hide();
      })
    </script>

    @include('backend.template.dashboard.includes.footer')
  </body>
</html>