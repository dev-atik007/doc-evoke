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
                    <th>@lang('Added By')</th>
                    @if (request()->routeIs('admin.appointment.trashed'))
                        <th>Trashed By</th>
                    @endif
                    <th>Booking Date</th>
                    <th>Time / Serial No</th>
                    <th>Payment Status</th>
                    @if (!request()->routeIs('admin.appointment.trashed'))
                        <th>Service</th>
                    @endif
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $key=>$appointment)
                    @php
                        $rowNumber = ($appointments->currentPage() - 1) * $appointments->perPage() + $key + 1;
                    @endphp
                    <tr>
                        <td>{{ $rowNumber }}</td>
                        <td><span class="fw-bold d-block"> {{ ($appointment->name) }}</span>{{ $appointment->mobile }}</td>
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
                        @if (request()->routeIs('admin.appointment.trashed'))
                            <td>
                                @if ($appointment->delete_by_admin)
                                    <span class="text--small badge badge--primary">@lang('Admin')</span>
                                @elseif ($appointment->delete_by_staff)
                                    <a href="{{route('admin.staff.detail', $appointment->deletedByStaff->id)}}"> {{ __($appointment->deletedByStaff->name) }}</a>
                                    <br>
                                    <span class="text--small badge badge--dark">@lang('Staff')</span>
                                @elseif ($appointment->delete_by_assistant)
                                    <a href="{{route('admin.assistant.detail', $appointment->deletedByAssistant->id)}}"> {{ __($appointment->deletedByAssistant->name) }}</a>
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
                                    data-route=""
                                    data-appoinment-done="{{ route('admin.appointment.done', $appointment->id) }}"
                                    data-resourse="{{ $appointment }}">
                                    <i class="las la-desktop"></i> Details
                                </button>
                                @if (request()->routeIs('admin.appointment.index'))
                                    <button type="button"
                                        class="btn btn-sm btn-outline--danger confirmationBtn"
                                        @if (!$appointment->is_delete && !$appointment->payment_status) ''  @else disabled @endif
                                        data-action="{{ route('admin.appointment.remove', $appointment->id) }}"
                                        data-question="@lang('Are you sure to remove this appointment')?">
                                        <i class="la la-trash"></i> @lang('Trash')
                                    </button>
                                @endif                               
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
@include('admin.appointment.appointment_modal')

{{-- Remove MODAL --}}
    <x-confirmation-modal />

@endsection

@push('breadcrumb-plugins')
<a href="{{ route('admin.appointment.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>
@endpush