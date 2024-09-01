<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>{{ $general->siteName($pageTitle ?? '') }}</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="public/admin/assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('public/admin/assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/pages/page-auth.css') }}" />

  <!-- Helpers -->
  <!-- <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script> -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('public/admin/assets/js/config.js') }}"></script>
  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @stack('style')
</head>

<body>


  @yield('content')




  <script src="{{ asset('public/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('public/admin/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('public/admin/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('public/admin/assets/vendor/js/menu.js') }}"></script>

 
  @include('partials.notify')
  


  <script async defer src="https://buttons.github.io/buttons.js"></script>

  @stack('script')
</body>

</html>