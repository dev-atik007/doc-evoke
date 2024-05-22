<!-- ======= Services Section ======= -->
<section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>{{ $sections_description->service }}</p>
        </div>
        
        <div class="row">
        @foreach ($services as $service)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="{{ $service->icon }}"></i></div>    
              <h4><a href="">{{ $service->title }}</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- End Services Section -->