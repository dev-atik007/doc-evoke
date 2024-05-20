<li class="menu-item @if(request()->routeIs('admin.dashboard')) active @endif">
  <a href="{{ route('admin.dashboard') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-collection"></i>
    <div data-i18n="Basic">Dashboard</div>
  </a>
</li>

<li class="menu-item @if(request()->routeIs('admin.department.index')) active @endif">
  <a href="{{ route('admin.department.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-collection"></i>
    <div data-i18n="Basic">Departments</div>
  </a>
</li>

<li class="menu-item @if (request()->routeIs('admin.department.location')) active @endif">
  <a href="{{ route('admin.department.location') }}" class="menu-link">
    <i class="menu-icon fa-solid fa-location-dot"></i>
    <div data-i18n="Basic">Locations</div>
  </a>
</li>

<!-- Appoinments -->
<li class="menu-item @if(request()->routeIs('admin.appointment*')) open active @endif">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
    <div data-i18n="Layouts">Appoinments</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item @if (request()->routeIs('admin.appointment.form') active @endif">
      <a href="{{ route('admin.appointment.form') }}" class="menu-link">
        <div data-i18n="Without menu">Make Appointment</div>
      </a>
    </li>
    <li class="menu-item @if (request()->routeIs('admin.appointment.index') active @endif">
      <a href="{{ route('admin.appointment.index') }}" class="menu-link">
        <div data-i18n="Without navbar">New Appointments</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-container.html" class="menu-link">
        <div data-i18n="Container">Done Appointments</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Trashed Appointments</div>
      </a>
    </li>
  </ul>
</li>
<!-- Appoinments end -->

<!-- Payments -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
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
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
    <div data-i18n="Layouts">Manage Doctor</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="{{ route('admin.doctor.form') }}" class="menu-link">
        <div data-i18n="Without menu">Add New</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('admin.doctor.index') }}" class="menu-link">
        <div data-i18n="Without navbar">All Doctors</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('admin.doctor.active') }}" class="menu-link">
        <div data-i18n="Container">Active Doctors</div>
      </a>
    </li>
    <li class="menu-item">
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
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
    <div data-i18n="Layouts">Manage Assistants</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="{{ route('admin.assistant.form') }}" class="menu-link">
        <div data-i18n="Without menu">Add New</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('admin.assistant.index') }}" class="menu-link">
        <div data-i18n="Without navbar">All Assistants</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ route('admin.assistant.active') }}" class="menu-link">
        <div data-i18n="Container">Active Assistants</div>
      </a>
    </li>
    <li class="menu-item">
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
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
    <div data-i18n="Layouts">Manage Staff</div>
  </a>

  <ul class="menu-sub">
    <li class="menu-item">
      <a href="{{ route('admin.staff.form') }}" class="menu-link">
        <div data-i18n="Without menu">Add New</div>
      </a>
    </li>
    <li class="menu-item">
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

<!-- Payments Gateway -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
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
    <i class="menu-icon tf-icons bx bx-layout"></i>
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
    <i class="menu-icon tf-icons bx bx-layout"></i>
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
<li class="menu-item @if(request()->routeIs('subscribe')) active @endif">
  <a href="{{ route('subscribe') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-collection"></i>
    <div data-i18n="Basic">Subscribers</div>
  </a>
</li>
<!-- end subscribe -->


<li class="menu-header small text-uppercase">
  <span class="menu-header-text">SETTINGS</span>
</li>

<!-- General Setting -->
<li class="menu-item">
  <a href="{{ route('admin.setting.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
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
    <i class="menu-icon tf-icons bx bx-support"></i>
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
    <i class="menu-icon tf-icons bx bx-support"></i>
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

<li class="menu-item">
  <a href="{{ route('description') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">Manage Description</div>
  </a>
</li>

<li class="menu-item">
  <a href="{{ route('contact.index') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">Contact Form</div>
  </a>
</li>

<li class="menu-item @if(request()->routeIs('admin.frontend*')) open active @endif">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons bx bx-layout"></i>
    <div data-i18n="Layouts">Manage Section</div>
  </a>

  <ul class="menu-sub @if (request()->routeIs('admin.frontend.banner.section') active @endif">
    <li class="menu-item ">
      <a href="{{ route('admin.frontend.banner.section') }}" class="menu-link">
        <div data-i18n="Without menu">Banner Section</div>
      </a>
    </li>
        <li class="menu-item @if (request()->routeIs('admin.frontend.emergency.contact') active @endif">
      <a href="{{ route('admin.frontend.emergency.contact') }}" class="menu-link">
        <div data-i18n="Without navbar">Contact Us</div>
      </a>
    </li>
    <li class="menu-item @if (request()->routeIs('footer.info') active @endif">
      <a href="{{ route('footer.info') }}" class="menu-link">
        <div data-i18n="Without navbar">Footer</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Breadcrubm Section</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Department Section</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Doctor Section</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">FAQ Section</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Feature Section</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Footer Section</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Partner Section</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Search Section</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Social Icons</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Testimonial Section</div>
      </a>
    </li>
  </ul>
</li>
<!-- Report end -->




<!-- EXTRA -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">EXTRA</span></li>

<li class="menu-item">
  <a href="" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">Maintenance Mode</div>
  </a>
</li>

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
    <div data-i18n="Support">Custom CSS</div>
  </a>
</li>

<li class="menu-item">
  <a href="" class="menu-link">
    <i class="menu-icon tf-icons bx bx-support"></i>
    <div data-i18n="Support">Report Request</div>
  </a>
</li>