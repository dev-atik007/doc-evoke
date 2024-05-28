<!-- ======= About Section ======= -->
<section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=WgOhlwxU7eE&ab_channel=FeelingAESTHETIC%F0%9F%8C%BC" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
            <p>{{ $sections_description->about_section }}</p>
            @foreach ($aboutSection as $data)
              <div class="icon-box">
                <div class="icon"><i class="{{ $data->icon }}"></i></div>
                <h4 class="title"><a href="">{{ $data->name }}</a></h4>
                <p class="description">{{ $data->about }}</p>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </section><!-- End About Section -->