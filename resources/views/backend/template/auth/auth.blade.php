<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/png" />

  @include('backend.template.auth.includes.header')

  <style>
    .login-logo{
      text-align: right;
    }

    .login-logo img{
      max-width: 200px;
    }

    #loader-wrapper {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.9);
      z-index: 1000;
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

  <script> const BASE_URL = "{{ url('') }}"; </script>

  <title>{{ $pageTitle ?? 'CMS Login' }}</title>
</head>

<body class="bg-reset-password">

  <!--start wrapper-->
  <div class="wrapper">
    
    <!-- Loader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
    </div>

    <!--start content-->
    <main class="authentication-content">
      <div class="container-fluid">
        <div class="authentication-card">

          @yield('authcontent')

        </div>
      </div>
    </main>
    <!--end page main-->

  </div>
  <!--end wrapper-->

  @include('backend.template.auth.includes.footer')

  <script>
    $(document).ready(function() {
      $('#loader-wrapper').hide();
    })
  </script>
  
</body>
</html>