@extends('admin.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Patient | Mobile</th>
                    <th>Doctor</th>
                    <th>Added By</th>
                    <th>Booking Date</th>
                    <th>Time / Serial No</th>
                    <th>Payment Status</th>
                    <th>Service</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointments->firstItem() + $loop->index }}</td>
                        <td><span class="fw-bold d-block"> {{ __($appointment->name) }}</span>
                            {{ $appointment->mobile }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>
                            @if ($appointment->added_staff_id)
                                    <a href="">{{ __(@$appointment->staff->name) }}</a>
                                        <br> <span
                                        class="text--small badge badge--primary">Staff</span>
                                @elseif($appointment->added_assistant_id)
                                    <a href=""> {{ __(@$appointment->assistant->name) }}</a>
                                    <br> <span
                                        class="text--small badge badge--dark">Assistant</span>
                                @elseif($appointment->added_doctor_id)
                                    <a href=""> {{ __(@$appointment->doctor->name) }}</a> <br> <span
                                        class="text--small badge badge--success">Doctor</span>
                                @elseif($appointment->added_admin_id)
                                    {{ __(@$appointment->admin->name) }} <br> <span
                                        class="text--small badge badge--primary">Admin</span>
                                @elseif($appointment->site)
                                    <span class="text--small badge badge--info">Site</span>
                            @endif
                        </td>
                        <td>{{ $appointment->booking_date }}</td>
                        <td>{{ $appointment->time_serial }}</td>
                        <td></td>

                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">
       
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
<a href="{{ route('admin.appointment.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>
@endpush