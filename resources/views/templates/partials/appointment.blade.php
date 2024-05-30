<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>{{ $sections_description->appointment }}</p>
        </div>

        <form action="{{ route('appointment.store') }}" method="post" role="form" class="form">
          @csrf

          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select">
                <option value="" selected disabled>Select Department</option>
                
                @foreach ($departments as $department)
                  <option value="{{$department->id}}" data-doctors="{{ $department->doctors }}">{{$department->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="doctor_id" class="form-select">
              </select>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          </div>

          <div class="text-center"><button type="submit">Make an Appointment</button></div>
        
        </form>
      </div>
    </section><!-- End Appointment Section -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $('[name=department]').on('change', function() {
            let doctors = $(this).find(':selected').data('doctors');
            let html = `<option value="">Select Doctor</option>`;

            $.each(doctors, function(i, v) {
         
                html += `<option value="${v.id}">${v.name}</option>`;
            });

            $('[name=doctor_id]').html(html);
        });
    </script>
    <!-- html += `<option value="${v.id}">${v.name}</option>`; -->
