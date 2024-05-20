@extends('assistant.layouts.abc')
@section('content')
<h4 class="py-3 mb-4">
  <b>Dashboard</b>
</h4>

<div class="row">
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-primary h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck"></i></span>
          </div>
          <h4 class="ms-1 mb-0">42</h4>
        </div>
        <p class="mb-1">Total Departments</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-warning h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-warning"><i class='bx bx-error'></i></span>
          </div>
          <h4 class="ms-1 mb-0">8</h4>
        </div>
        <p class="mb-1">Total Department Locations</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-danger h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-danger"><i class='bx bx-git-repo-forked'></i></span>
          </div>
          <h4 class="ms-1 mb-0">27</h4>
        </div>
        <p class="mb-1">Total New Appointments</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 mb-4">
    <div class="card card-border-shadow-info h-100">
      <div class="card-body">
        <div class="d-flex align-items-center mb-2 pb-1">
          <div class="avatar me-2">
            <span class="avatar-initial rounded bg-label-info"><i class='bx bx-time-five'></i></span>
          </div>
          <h4 class="ms-1 mb-0">13</h4>
        </div>
        <p class="mb-1">Total Done Appointments</p>
      </div>
    </div>
  </div>
</div>



<h4 class="py-3 mb-4">
  <b>Assigned Doctor List</b>
</h4> 
<div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table">
        <thead>
            <tr>
                <th><strong>S.N.</strong></th>
                <th><strong>Doctor</strong></th>
                <th><strong>Schedule Type</strong></th>
                <th><strong>Serial / Slot Info</strong></th>
                <th><strong>Department</strong></th>
                <th><strong>Location</strong></th>

            </tr>
        </thead>
        <tbody class="">
            @forelse ($doctors as $key=>$doctor)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>
                        @if ($doctor->slot_type == 1)
                            Serial
                        @else
                            Time Slot
                        @endif
                    </td>
                    <td>{{ $doctor->max_serial }}</td>
                    <td>{{ $doctor->department->name }}</td>
                    <td>{{ $doctor->location->name }}</td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
  </div>
</div>

  
@endsection