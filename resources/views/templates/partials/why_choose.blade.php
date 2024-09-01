<!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Doc-eVoke?</h3>
              <p>
                {{$sections_description->why_choose}}
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                @foreach ($whyChoose as $data)
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="{{ $data->icon }}"></i>
                    <h4>{{ $data->heading }}</h4>
                    <p>{{ $data->details }}</p>
                  </div>
                </div> 
                @endforeach
              </div>
            </div><!-- End .content-->
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->