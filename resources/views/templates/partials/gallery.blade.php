<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>{{ $sections_description->gallery }}</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row g-0">
        @foreach ($gallery as $image)

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ asset('public/templates/assets/img/gallery/gallery-1.jpg') }}" class="galelry-lightbox">
                <img src="{{ getImage(getFilePath('gallery') . '/' . $image->image, getFileSize('gallery')) }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
        @endforeach

        </div>

      </div>
    </section><!-- End Gallery Section -->