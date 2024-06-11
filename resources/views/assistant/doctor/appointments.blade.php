@extends('assistant.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th><strong>S.N.</strong></th>
                    <th><strong>Patient | Mobile</strong></th>
                    <th>Doctor</th>
                    <th><strong>Added By</strong></th>
                    @if (request()->routeIs('assistant.doctor.appointment.trashed'))
                        <th>Trashed By</th>
                    @endif
                    <th><strong>Booking Date</strong></th>
                    <th><strong>Time / Serial No</strong></th>
                    <th><strong>Payment Status</strong></th>
                    @if (!request()->routeIs('assistant.doctor.appointment.trashed'))
                        <th>Service</th>
                    @endif
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($appointments as $key=>$appointment)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $appointment->name }} <br> {{ $appointment->mobile }}</td>
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
                        @if (request()->routeIs('assistant.doctor.appointment.trashed'))
                            <td>
                                @if ($appointment->delete_by_admin)
                                    <span class="text--small badge badge--primary">@lang('Admin')</span>
                                @elseif ($appointment->delete_by_staff)
                                    <a href=""> {{ __(@$appointment->deletedByStaff->name) }}</a>
                                    <br>
                                    <span class="text--small badge badge--dark">@lang('Staff')</span>
                                @elseif ($appointment->delete_by_assistant)
                                    <a href=""> {{ __(@$appointment->deletedByAssistant->name) }}</a>
                                    <br>
                                    <span class="text--small badge badge--success">@lang('Assistant')</span>
                                @elseif ($appointment->delete_by_doctor)
                                    <a href=""> {{ __(@$appointment->deletedByDoctor->name) }}</a>
                                    <br>
                                    <span class="text--small badge badge--info">@lang('Doctor')</span>
                                @endif
                            </td>
                        @endif
                    <td>{{ showDateTime($appointment->booking_date) }}</td>
                    <td>{{ $appointment->time_serial }}</td>
                    <td>@php echo $appointment->paymentBadge; @endphp</td>
                    @if (!request()->routeIs('admin.appointment.trashed'))
                        <td>@php echo $appointment->serviceBadge; @endphp</td>
                    @endif
                    <td>
                        <div class="button--group">
                            <button class="btn btn-sm btn-outline--primary detailBtn"
         
                                data-appoinment-done="{{ route('assistant.doctor.appointment.done', $appointment->id) }}"
                                data-resourse="{{ $appointment }}">
                                <i class="las la-desktop"></i> Details
                            </button>

                            @if (request()->routeIs('assistant.doctor.appointment.new'))
                            <button type="button" class="btn btn-sm btn-outline--danger confirmationBtn"
                                data-action="{{ route('assistant.doctor.appointment.remove', $appointment->id) }}" 
                                data-question="@lang('Are you sure to remove this appointment')?">
                                <i class="la la-trash"></i> @lang('Trash')
                            </button>
                            @endif 
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-muted text-center" colspan="100%">New Appointment data not avoiable</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('partials.appointment_done')
    {{-- Remove MODAL --}}
    <x-confirmation-modal />
@endsection


@push('breadcrumb-plugins')
<a href="{{ route('assistant.doctor.appointment.create.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i>@lang('Make New')
</a>
@endpush