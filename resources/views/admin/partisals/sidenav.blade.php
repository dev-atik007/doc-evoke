<li class="menu-item {{menuActive('admin.dashboard')}}">
  <a href="{{ route('admin.dashboard') }}" class="menu-link">
    <i class="menu-icon fas fa-home"></i>
    <div data-i18n="Basic">Dashboard</div>
  </a>
</li>

<li class="menu-item {{menuActive('admin.department.index')}}">
  <a href="{{ route('admin.department.index') }}" class="menu-link">
    <i class="menu-icon fa-solid fa-layer-group"></i>
    <div data-i18n="Basic">Departments</div>
  </a>
</li>

<li class="menu-item {{menuActive('admin.department.location')}}">
  <a href="{{ route('admin.department.location') }}" class="menu-link">
    <i class="menu-icon fa-solid fa-location-dot"></i>
    <div data-i18n="Basic">Locations</div>
  </a>
</li>

<!-- Appoinments -->
<li class="menu-item {{menuActive('admin.appointment*',4)}}">
  <a href="javascript:void(0);" class="menu-link menu-toggle  {{menuActive('admin.appointment*',4)}}">
    <i class="menu-icon fas fa-handshake"></i>
    <div data-i18n="Layouts">Appoinments</div>
  </a>

  <ul class="menu-sub ">
    <li class="menu-item {{menuActive('admin.appointment.form')}}">
      <a href="{{ route('admin.appointment.form') }}" class="menu-link">
        <div data-i18n="Without menu">Make Appointment</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.appointment.index')}}">
      <a href="{{ route('admin.appointment.index') }}" class="menu-link">
        <div data-i18n="Without navbar">New Appointments</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.appointment.completed')}}">
      <a href="{{ route('admin.appointment.completed') }}" class="menu-link">
        <div data-i18n="Container">Done Appointments</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.appointment.trashed')}}">
      <a href="{{ route('admin.appointment.trashed') }}" class="menu-link">
        <div data-i18n="Fluid">Trashed Appointments</div>
      </a>
    </li>
  </ul>
</li>
<!-- Appoinments end -->

<!-- Payments -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon fas fa-file-invoice-dollar"></i>
    <div data-i18n="Layouts">Payments</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="layouts-without-menu.html" class="menu-link">
        <div data-i18n="Without menu">Pending</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Approve</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-container.html" class="menu-link">
        <div data-i18n="Container">Successfull</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Rejected</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Initiated</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">All</div>
      </a>
    </li>
  </ul>
</li>
<!-- Payments end -->

<!-- Doctors -->
<li class="menu-item {{menuActive('admin.doctor*',6)}}">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon fa-solid fa-stethoscope"></i>
    <div data-i18n="Layouts">Manage Doctor</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item {{menuActive('admin.doctor.form')}}">
      <a href="{{ route('admin.doctor.form') }}" class="menu-link">
        <div data-i18n="Without menu">Add New</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.doctor.index')}}">
      <a href="{{ route('admin.doctor.index') }}" class="menu-link">
        <div data-i18n="Without navbar">All Doctors</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.doctor.active')}}">
      <a href="{{ route('admin.doctor.active') }}" class="menu-link">
        <div data-i18n="Container">Active Doctors</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.doctor.inactive')}}">
      <a href="{{ route('admin.doctor.inactive') }}" class="menu-link">
        <div data-i18n="Fluid">Inactive Doctors</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Notification to All</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Login History</div>
      </a>
    </li>
  </ul>
</li>
<!-- Doctors end -->

<!-- Assistants -->
<li class="menu-item {{menuActive('admin.assistant*',6)}}">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon fas fa-user-friends"></i>
    <div data-i18n="Layouts">Manage Assistants</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item {{menuActive('admin.assistant.form')}}">
      <a href="{{ route('admin.assistant.form') }}" class="menu-link">
        <div data-i18n="Without menu">Add New</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.assistant.index')}}">
      <a href="{{ route('admin.assistant.index') }}" class="menu-link">
        <div data-i18n="Without navbar">All Assistants</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.assistant.active')}}">
      <a href="{{ route('admin.assistant.active') }}" class="menu-link">
        <div data-i18n="Container">Active Assistants</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.assistant.inactive')}}">
      <a href="{{ route('admin.assistant.inactive') }}" class="menu-link">
        <div data-i18n="Fluid">Inactive Assistants</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Notification to All</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Login History</div>
      </a>
    </li>
  </ul>
</li>
<!-- Assistants end -->

<!-- Staff -->
<li class="menu-item {{menuActive('admin.staff*',6)}}">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon fas fa-users"></i>
    <div data-i18n="Layouts">Manage Staff</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item {{menuActive('admin.staff.form')}}">
      <a href="{{ route('admin.staff.form') }}" class="menu-link">
        <div data-i18n="Without menu">Add New</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.staff.index')}}">
      <a href="{{ route('admin.staff.index') }}" class="menu-link">
        <div data-i18n="Without navbar">All Staff</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-container.html" class="menu-link">
        <div data-i18n="Container">Active Staff</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Inactive Staff</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Notification to All</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Login History</div>
      </a>
    </li>
  </ul>
</li>
<!-- Staffs end -->
<!-- Service -->
<li class="menu-item {{menuActive('admin.service.index')}}">
  <a href="{{ route('admin.service.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-collection"></i>
    <div data-i18n="Basic">Service</div>
  </a>
</li>
<!-- end Service -->
<!-- Payments Gateway -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon fa-solid fa-credit-card"></i>
    <div data-i18n="Layouts">Payment Gateways</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="layouts-without-menu.html" class="menu-link">
        <div data-i18n="Without menu">Automatic Gateways</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Manual Gateways</div>
      </a>
    </li>
  </ul>
</li>
<!-- Payment Gate way end -->

<!-- Support Ticket -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon fa-solid fa-file-invoice-dollar"></i>
    <div data-i18n="Layouts">Support Ticket</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="layouts-without-menu.html" class="menu-link">
        <div data-i18n="Without menu">Pending Ticket</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Closed Ticket</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Answered Ticket</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">All Ticket</div>
      </a>
    </li>
  </ul>
</li>
<!-- Support Ticket end -->

<!-- Report -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon  fas fa-list"></i>
    <div data-i18n="Layouts">Report</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="layouts-without-menu.html" class="menu-link">
        <div data-i18n="Without menu">Transaction Log</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Notification History</div>
      </a>
    </li>
  </ul>
</li>
<!-- Report end -->

<!-- Subscribe -->
<li class="menu-item {{menuActive('subscribe')}}">
  <a href="{{ route('subscribe') }}" class="menu-link">
    <i class="menu-icon fas fa-thumbs-up"></i>
    <div data-i18n="Basic">Subscribers</div>
  </a>
</li>
<!-- end subscribe -->

<li class="menu-header small text-uppercase">
  <span class="menu-header-text">SETTINGS</span>
</li>

<!-- General Setting -->
<li class="menu-item {{menuActive('admin.setting.index')}}">
  <a href="{{ route('admin.setting.index') }}" class="menu-link">
    <i class="menu-icon fas fa-life-ring"></i>
    <div data-i18n="Support">General Setting</div>
  </a>
</li>

<li class="menu-item">
  <a href="" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">System Configuration</div>
  </a>
</li>

<li class="menu-item">
  <a href="" class="menu-link">
    <i class="menu-icon fas fa-images"></i>
    <div data-i18n="Support">Logo & Favicon</div>
  </a>
</li>

<li class="menu-item">
  <a href="" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">Extensions</div>
  </a>
</li>

<li class="menu-item">
  <a href="" class="menu-link">
    <i class="menu-icon fas fa-language"></i>
    <div data-i18n="Support">Language</div>
  </a>
</li>

<li class="menu-item">
  <a href="" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">SEO Manager</div>
  </a>
</li>

<!-- Notification Setting -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
    <div data-i18n="Layouts">Notification Setting</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="layouts-without-menu.html" class="menu-link">
        <div data-i18n="Without menu">Global Template</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Email Setting</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">SMS Setting</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Notification Templates</div>
      </a>
    </li>
  </ul>
</li>
<!-- Notification Setting end-->

<!-- FRONTEND MANAGER -->

<li class="menu-header small text-uppercase">
  <span class="menu-header-text">FRONTEND MANAGER</span>
</li>

<li class="menu-item {{menuActive('description')}}">
  <a href="{{ route('description') }}" class="menu-link">
    <i class="menu-icon fas fa-prescription"></i>
    <div data-i18n="Support">Manage Description</div>
  </a>
</li>

<li class="menu-item {{menuActive('contact.index')}}">
  <a href="{{ route('contact.index') }}" class="menu-link">
    <i class="menu-icon fas fa-file-signature"></i>
    <div data-i18n="Support">Contact Form</div>
  </a>
</li>

<li class="menu-item {{menuActive('admin.frontend*',10)}}">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon fa-solid fa-puzzle-piece"></i>
    <div data-i18n="Layouts">Manage Section</div>
  </a>

  <ul class="menu-sub ">
    <li class="menu-item {{menuActive('admin.frontend.banner.section')}}">
      <a href="{{ route('admin.frontend.banner.section') }}" class="menu-link">
        <div data-i18n="Without menu">Banner Section</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('admin.frontend.emergency.contact')}}">
      <a href="{{ route('admin.frontend.emergency.contact') }}" class="menu-link">
        <div data-i18n="Without navbar">Contact Us</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('footer.info')}}">
      <a href="{{ route('footer.info') }}" class="menu-link">
        <div data-i18n="Without navbar">Footer Section</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('gallery.index')}}">
      <a href="{{ route('gallery.index') }}" class="menu-link">
        <div data-i18n="Without navbar">Image Section</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('video.content')}}">
      <a href="{{ route('video.content') }}" class="menu-link">
        <div data-i18n="Without navbar">video Section</div>
      </a>
    </li>

    <li class="menu-item {{menuActive('frequently.index')}}">
      <a href="{{ route('frequently.index') }}" class="menu-link">
        <div data-i18n="Without navbar">FAQ Section</div>
      </a>
    </li>


    <li class="menu-item {{menuActive('about.section')}}">
      <a href="{{ route('about.section') }}" class="menu-link">
        <div data-i18n="Without navbar">About Section</div>
      </a>
    </li>
    <li class="menu-item {{menuActive('why.choose')}}">
      <a href="{{ route('why.choose') }}" class="menu-link">
        <div data-i18n="Without navbar">Why Choose</div>
      </a>
    </li>
    <li class="menu-item testimonials">
      <a href="{{ route('testimonials') }}" class="menu-link">
        <div data-i18n="Without navbar">Testimonial Section</div>
      </a>
    </li>
  </ul>
</li>
<!-- Report end -->


<!-- EXTRA -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">EXTRA</span></li>


<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
    <div data-i18n="Layouts">System</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="layouts-without-menu.html" class="menu-link">
        <div data-i18n="Without menu">Application</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Server</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Cache</div>
      </a>
    </li>
  </ul>
</li>

<li class="menu-item">
  <a href="" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">Report Request</div>
  </a>
</li>