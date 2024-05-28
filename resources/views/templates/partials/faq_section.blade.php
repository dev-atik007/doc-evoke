<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>{{ $sections_description->frequently }}</p>
        </div>

        <div class="faq-list">
          <ul>
            @foreach ($frenquently as $data)
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="@if($loop->first) collapse @else collapsed @endif" data-bs-target="#faq-list-{{ $loop->index }}">{{ $data->questions }}? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-{{ $loop->index }}" class="collapse @if($loop->first) show @endif" data-bs-parent=".faq-list">
                <p>
                  {{ $data->answer }}.
                </p>
              </div>
            </li>           
            @endforeach
          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->