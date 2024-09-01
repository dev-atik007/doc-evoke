<li class="menu-item {{menuActive('assistant.dashboard')}}">
  <a href="{{ route('assistant.dashboard') }}" class="menu-link">
    <i class="menu-icon fas fa-home"></i>
    <div data-i18n="Basic">Dashboard</div>
  </a>
</li>

<!-- Appoinments -->
<li class="menu-item {{ menuActive('assistant.doctor.appointment.create.form') }}">
  <a href="{{ route('assistant.doctor.appointment.create.form') }}" class="menu-link">
    <i class="menu-icon fas fa-handshake"></i>
    <div data-i18n="Basic">Appointment</div>
  </a>
</li>

<li class="menu-item {{ menuActive('assistant.doctor.appointment.index') }}">
  <a href="{{ route('assistant.doctor.appointment.index') }}" class="menu-link">
    <i class="menu-icon fa-solid fa-stethoscope"></i>
    <div data-i18n="Basic">Doctors</div>
  </a>
</li>

<li class="menu-item {{ menuActive('assistant.profile') }}">
  <a href="{{ route('assistant.profile') }}" class="menu-link">
    <i class="menu-icon fa-solid fa-stethoscope"></i>
    <div data-i18n="Basic">Profile</div>
  </a>
</li>