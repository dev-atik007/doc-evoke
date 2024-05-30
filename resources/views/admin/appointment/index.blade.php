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
                @forelse ($appointments as $key=>$appointment)
                        @php
                            // Calculate the actual row number
                            $rowNumber = ($appointments->currentPage() - 1) * $appointments->perPage() + $key + 1;
                        @endphp
                    <tr>
                        <td>{{ $rowNumber }}</td>
                        <td><span class="fw-bold d-block"> {{ ($appointment->name) }}</span>
                            {{ $appointment->mobile }}</td>
                        <td>{{ @$appointment->doctor->name }}</td>
                        <td>
                            @if ($appointment->added_staff_id)
                                    <a href="">{{ (@$appointment->staff->name) }}</a>
                                        <br> <span
                                        class="text--small badge badge--primary">Staff</span>
                                @elseif($appointment->added_assistant_id)
                                    <a href=""> {{ (@$appointment->assistant->name) }}</a>
                                    <br> <span
                                        class="text--small badge badge--dark">Assistant</span>
                                @elseif($appointment->added_doctor_id)
                                    <a href=""> {{ ($appointment->doctor->name) }}</a> <br> <span
                                        class="text--small badge badge--success">Doctor</span>
                                @elseif($appointment->added_admin_id)
                                    {{ (@$appointment->admin->name) }} <br> <span
                                        class="text--small badge badge--primary">Admin</span>
                                @elseif($appointment->site)
                                    <span class="text--small badge badge--info">Site</span>
                            @endif
                        </td>
                        <td>{{ showDateTime($appointment->booking_date) }}</td>
                        <td>{{ $appointment->time_serial }}</td>
                        <td>@php echo $appointment->paymentBadge; @endphp</td>
                        <td>@php echo $appointment->serviceBadge; @endphp</td>
                        <td>
                            <div class="button--group">
                                <button class="btn btn-sm btn-outline--primary detailBtn"
                                    data-route=""
                                    data-resourse="{{ $appointment }}">
                                    <i class="las la-desktop"></i> Details
                                </button>

                              
                                    <button type="button"
                                        class="btn btn-sm btn-outline--danger confirmationBtn"

                                        data-action=""
                                        data-question="@lang('Are you sure to remove this appointment')?">
                                        <i class="la la-trash"></i> Trash
                                    </button>
                               
                            </div>
                        </td>

                    </tr>
                @empty
                    <td class="text-muted text-center" colspan="100">$emptyMessage</td>
                @endforelse
            </tbody>
        </table>
             @if (@$appointments->hasPages())
                <div class="card-footer py-4">
                    @php echo paginateLinks(@$appointments) @endphp
                </div>
            @endif
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
<a href="{{ route('admin.appointment.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>
@endpush