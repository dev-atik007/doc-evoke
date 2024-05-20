@extends('assistant.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th><strong>S.N.</strong></th>
                    <th><strong>Patient | Mobile</strong></th>
                    <th><strong>Added By</strong></th>
                    <th><strong>Booking Date</strong></th>
                    <th><strong>Time / Serial No</strong></th>
                    <th><strong>Payment Status</strong></th>
                    <th><strong>Service</strong></th>
                    <th><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($appointments as $key=>$appointment)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $appointment->name }} <br> {{ $appointment->mobile }}</td>
                    <td>@php echo $appointment->addedByBadge; @endphp</td>
                    <td>{{ showDateTime($appointment->booking_date) }}</td>
                    <td>{{ $appointment->time_serial }}</td>
                    <td>@php echo $appointment->paymentBadge; @endphp</td>
                    <td>@php echo $appointment->serviceBadge; @endphp</td>
                    <td>
                        <div class="button--group">
                            <button class="btn btn-sm btn-outline--primary detailBtn" data-route="{{ route('assistant.doctor.appointment.dealing', $appointment->id) }}" data-appoinment-done="{{ route('assistant.doctor.appointment.done', $appointment->id) }}" data-resourse="{{ $appointment }}">
                                <i class="las la-desktop"></i> Details
                            </button>


                            <button type="button" class="btn btn-sm btn-outline--danger confirmationBtn" data-action="" data-question="@lang('Are you sure to remove this appointment')?">
                                <i class="la la-trash"></i> @lang('Trash')
                            </button>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('partials.appointment_done')

@endsection


@push('breadcrumb-plugins')
<a href="{{ route('assistant.doctor.appointment.create.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i>@lang('Make New')
</a>
@endpush