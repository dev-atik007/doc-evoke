<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>{{ $general->site_name }}</h3>
        <p>
          {{ $footer_section->street }} <br>
          {{ $footer_section->city }}<br>
          {{ $footer_section->country }} <br><br>
          <strong>Phone:</strong>{{ $bannerSections->email }}<br>
          <strong>Email:</strong>{{ $bannerSections->phone }}<br>
        </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Department Based
        </h4>
        <ul>
          @foreach ($departments as $department)
            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ $department->name }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Area Based</h4>
        <ul>
          @foreach ($locations as $location)
            <li><i class="bx bx-chevron-right"></i> <a href="#">{{ $location->name }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Join Our Newsletter</h4>
        <p>{{ $footer_section->newsletter }}</p>
        <form action="{{ route('user.subscribe') }}" method="post">
          @csrf
          <input type="email" name="email">
          <input type="submit" value="Subscribe">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>{{ $general->site_name }}</span></strong>. All Rights Reserved
    </div>

  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="https://twitter.com/" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="https://facebook.com/" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="https://instagram.com/" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="https://google-plus.com/" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="https://linkedin.com/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->