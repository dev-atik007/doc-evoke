@extends('doctor.layouts.abc')
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
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $appointment->name }} <br> {{ $appointment->mobile }}</td>
                        <td>{{ @$appointment->doctor->name }}</td>
                        <td>@php echo $appointment->addedByBadge; @endphp</td>
                        <td>{{ showDateTime($appointment->booking_date) }}</td>
                        <td>{{ $appointment->time_serial }}</td>
                        <td>@php echo $appointment->paymentBadge; @endphp</td>
                        <td>@php echo $appointment->serviceBadge; @endphp</td>
                        <td>
                            <div class="button--group">
                                <button class="btn btn-sm btn-outline--primary detailBtn" 
                                    data-appoinment-done="{{ route('doctor.appointment.done', $appointment->id) }}"
                                    data-resourse="{{ $appointment }}">
                                    <i class="las la-desktop"></i> Details
                                </button>

                                @if (request()->routeIs('doctor.appointment.index'))
                                    <button type="button" 
                                    class="btn btn-sm btn-outline--danger confirmationBtn"
                                    @if (!$appointment->is_delete && !$appointment->payment_status) ''  @else disabled @endif
                                     data-action="{{ route('doctor.appointment.remove', $appointment->id) }}" 
                                     data-question="@lang('Are you sure to remove this appointment')?">
                                        <i class="la la-trash"></i> @lang('Trash')
                                    </button>
                                @endif 
                            </div>
                    </td>
                    </tr>
                @empty
                <td class="text-muted text-center" colspan="100">Data not found</td>
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

    @include('doctor.appointment.appointment_modal')

    {{-- Remove MODAL --}}
    <x-confirmation-modal />
    
@endsection

@push('breadcrumb-plugins')
<a href="{{ route('doctor.appointment.booking') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>
@endpush




