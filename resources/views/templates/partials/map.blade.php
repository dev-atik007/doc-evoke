<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>{{ $sections_description->contact }}</p>
        </div>
      </div>

      <div>
        <!-- <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->

        <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?hl=en&amp;q=23.8748° N,%2090.3858° E+(Evoke)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{ $footer_section->street }}, {{ $footer_section->city }}</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $bannerSections->email }}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>{{ $bannerSections->phone }}</p>
              </div>
            </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('form.contact.user') }}" method="post" role="form">
              @csrf

              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control"  placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="number" class="form-control" name="number"  placeholder="Your NUmber" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject"  placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="sent-message"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->