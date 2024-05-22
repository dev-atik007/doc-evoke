<!-- ======= Doctors Section ======= -->
<section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>{{ $sections_description->doctor }}</p>
        </div>

        <div class="row">
        @foreach ($doctors as $doctor)
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{ getImage(getFilePath('doctorProfile').'/'. $doctor->image,getFileSize('doctorProfile'))}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                
                  <h4>{{ $doctor->name }}</h4>
                  <span>{{ $doctor->department->name }}</span>
                  <p>{{ $doctor->department->details }}</p>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                
              </div>
            </div>
          </div>
        @endforeach
        </div>

      </div>

    </section><!-- End Doctors Section -->