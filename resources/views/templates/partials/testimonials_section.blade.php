<!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
          @foreach ($testimonials as $testimonial)         
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{ getImage(getFilePath('testimonial') . '/' . $testimonial->image, getFileSize('testimonial')) }}" class="testimonial-img" alt="">
                  <h3>{{ $testimonial->name }}</h3>
                  <h4>{{ $testimonial->destination }}</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                     {{ $testimonial->description }} 
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
            @endforeach
           
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->