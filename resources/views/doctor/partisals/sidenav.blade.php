  <li class="menu-item {{menuActive('doctor.dashboard')}}">
    <a
      href="{{ route('doctor.dashboard') }}"
      class="menu-link">
      <i class="menu-icon fas fa-home"></i>
      <div data-i18n="Calendar">Dashboard</div>
      <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
    </a>
  </li>
 

  <li class="menu-item {{menuActive('doctor.appointment*',4)}}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon fas fa-handshake"></i>
      <div data-i18n="Layouts">Appoinments</div>
    </a>

    <ul class="menu-sub">
      <li class="menu-item {{menuActive('doctor.appointment.booking')}}">
        <a href="{{ route('doctor.appointment.booking') }}" class="menu-link">
          <div data-i18n="Without menu">Make Appointment</div>
        </a>
      </li>
      <li class="menu-item {{menuActive('doctor.appointment.index')}}">
        <a href="{{ route('doctor.appointment.index') }}" class="menu-link">
          <div data-i18n="Without navbar">New Appointments</div>
        </a>
      </li>
      <li class="menu-item {{menuActive('doctor.appointment.completed')}}">
        <a href="{{ route('doctor.appointment.completed') }}" class="menu-link">
          <div data-i18n="Container">Done Appointments</div>
        </a>
      </li>
      <li class="menu-item {{menuActive('doctor.appointment.trashed')}}">
        <a href="{{ route('doctor.appointment.trashed') }}" class="menu-link">
          <div data-i18n="Fluid">Trashed Appointments</div>
        </a>
      </li>
    </ul>
  </li>

  <li class="menu-item {{menuActive('doctor.schedule.index')}}">
    <a href="{{ route('doctor.schedule.index') }}" class="menu-link">
      <i class="menu-icon fas fa-calendar-check"></i>
      <div data-i18n="Basic">Schedules</div>
    </a>
  </li>

  <li class="menu-item {{menuActive('doctor.profile*',7)}}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon fas fa-info-circle"></i>
      <div data-i18n="Layouts">My Info</div>
    </a>

    <ul class="menu-sub">
      <li class="menu-item {{menuActive('doctor.profile')}}">
        <a href="{{ route('doctor.profile') }}" class="menu-link">
          <div data-i18n="Without menu">Profile</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <div data-i18n="Without navbar">About</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="layouts-container.html" class="menu-link">
          <div data-i18n="Container">Speciality</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="layouts-fluid.html" class="menu-link">
          <div data-i18n="Fluid">Education</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="layouts-fluid.html" class="menu-link">
          <div data-i18n="Fluid">Experience</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="layouts-fluid.html" class="menu-link">
          <div data-i18n="Fluid">Social Icons</div>
        </a>
      </li>
    </ul>
  </li>



