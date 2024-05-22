 <!-- ======= Departments Section ======= -->
 <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
          <p>{{ $sections_description->department }}</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              @foreach ($departments as $department)
                <li class="nav-item">
                  <a class="nav-link @if($loop->first) active show @endif" data-bs-toggle="tab" href="#tab-{{ $loop->index }}">{{ $department->name }}</a>
                </li>
              @endforeach
              
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              @foreach ($departments as $department)
                <div class="tab-pane @if($loop->first) active show @endif" id="tab-{{ $loop->index }}">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>{{ $department->name }}</h3>
                      <p class="fst-italic">{{ $department->details }}</p>
                      <p>{{ $department->about }}</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="{{ asset('public/templates/assets/img/departments-1.jpg') }}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->