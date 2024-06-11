@extends('admin.layouts.master')
@section('content')


<h4 class="py-3 mb-4">
  <b>Dashboard</b>
</h4>

<div class="row">
  <div class="col-sm-6 col-lg-3 mb-4">
    <a href="{{ route('admin.department.index') }}">
    <div class="card card-border-shadow-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary">
            
              <i class="menu-icon fa-solid fa-layer-group"></i></span>
          
          </div>
          <h4 class="ms-1 mb-0">{{ $total_department }}</h4>
        </div>
        <p class="mb-1">Total Departments</p>
      </div>
    </div>
    </a>
  </div>
 
  <div class="col-sm-6 col-lg-3 mb-4">
    <a href="{{ route('admin.department.index') }}">
    <div class="card card-border-shadow-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary">
              <i class="menu-icon fa-solid fa-location-dot"></i></span>
          </div>
          <h4 class="ms-1 mb-0">{{ $total_location }}</h4>
        </div>
        <p class="mb-1">Total Department Locations</p>
      </div>
    </div>
    </a>
  </div>

  <div class="col-sm-6 col-lg-3 mb-4">
    <a href="{{ route('admin.appointment.index') }}">
    <div class="card card-border-shadow-danger h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary">
            <i class='menu-icon fas fa-handshake'></i> 
            </span>
          </div>
          <h4 class="ms-1 mb-0">{{ $total_new_appointments }}</h4>
        </div>
        <p class="mb-1">Total New Appointments</p>
      </div>
    </div>
    </a>
  </div>

  <div class="col-sm-6 col-lg-3 mb-4">
    <a href="">
    <div class="card card-border-shadow-danger h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary">
              <i class='menu-icon fas fa-check-square'></i>
            </span>
          </div>
          <h4 class="ms-1 mb-0">{{ $total_done_appointments }}</h4>
        </div>
        <p class="mb-1">Total Done Appointments</p>
      </div>
    </div>
    </a> 
  </div>

</div>


<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3" >
          <a href="{{ route('admin.doctor.index') }}">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">{{ $total_doctor }}</h3>
              <p class="mb-0">Total Doctors</p>
            </div>
            <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary" >
                <i class="menu-icon fa-solid fa-stethoscope"></i>
              </span>
            </div>
          </div>
          </a>
          <hr class="d-none d-sm-block d-lg-none me-4">
        </div>
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.staff.index') }}">
          <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">{{ $total_staff }}</h3>
              <p class="mb-0">Total Staff</p>
            </div>
            <div class="avatar me-lg-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="menu-icon fas fa-users"></i>
              </span>
            </div>
          </div>
          </a>
          <hr class="d-none d-sm-block d-lg-none">
        </div>
        <div class="col-sm-6 col-lg-3">
          <a href="{{ route('admin.assistant.index') }}">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h3 class="mb-2">{{ $total_assistant }}</h3>
              <p class="mb-0">Total Assistants</p>
            </div>
            <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="menu-icon fas fa-user-friends"></i>
              </span>
            </div>
          </div>
          </a>
        </div>
        <div class="col-sm-6 col-lg-3">
          <a href="">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h3 class="mb-2">32</h3>
              <p class="mb-0">Pending Support Tickets</p>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-error-alt bx-sm"></i>
              </span>
            </div>
          </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3">
          <a href="">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">56</h3>
              <p class="mb-0">Total Deposited</p>
            </div>
            <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-calendar bx-sm"></i>
              </span>
            </div>
          </div>
          </a>
          <hr class="d-none d-sm-block d-lg-none me-4">
        </div>
        <div class="col-sm-6 col-lg-3">
          <a href="">
          <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h3 class="mb-2">12,689</h3>
              <p class="mb-0">Pending Deposits</p>
            </div>
            <div class="avatar me-lg-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-check-double bx-sm"></i>
              </span>
            </div>
          </div>
          </a>
          <hr class="d-none d-sm-block d-lg-none">
        </div>
        <div class="col-sm-6 col-lg-3">
          <a href="">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h3 class="mb-2">124</h3>
              <p class="mb-0">Rejected Deposits</p>
            </div>
            <div class="avatar me-sm-4">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-wallet bx-sm"></i>
              </span>
            </div>
          </div>
          </a>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h3 class="mb-2">32</h3>
              <p class="mb-0">Deposit Charge</p>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-secondary">
                <i class="bx bx-error-alt bx-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



 
@endsection