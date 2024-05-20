<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $general->siteName($pageTitle ?? '') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('public/templates/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ ('templates/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('public/templates/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/templates/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/templates/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/templates/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('public/templates/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/templates/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/templates/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('public/templates/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  @stack('style-lib')

  @stack('style')

  <!-- Template Main CSS File -->
  <link href="{{ asset('public/templates/assets/css/style.css') }}" rel="stylesheet">
  
  <style>
    #hero {
    background: url("public/assets/admin/images/profile/{{ $bannerSections->image }}") top center;

  }
  </style>
</head>

<body>

  @include('templates.partials.topBar')

  @include('templates.partials.header')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>{{ $bannerSections->heading }}</h1>
      <h2>{{ $bannerSections->subheading }}</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    @include('templates.partials.why_choose')


    @include('templates.partials.about')


    @include('templates.partials.count_section')


    @include('templates.partials.services_section')


    @include('templates.partials.appointment')


    @include('templates.partials.departmrnt')

    @include('templates.partials.doctors')


    @include('templates.partials.faq_section')


    @include('templates.partials.testimonials_section')


    @include('templates.partials.gallery')


    @include('templates.partials.map')

    @yield('content')

  </main><!-- End #main -->

  @include('templates.partials.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('public/templates/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('public/templates/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/templates/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('public/templates/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('public/templates/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('public/templates/assets/js/main.js') }}"></script>

  @stack('script-lib')

  @stack('script')

  @include('partials.notify')

</body>

</html>