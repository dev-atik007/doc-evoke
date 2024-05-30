@extends('staff.layouts.abc')
@section('panel')
<div class="row">
    <div class="col-md-12">
        <div class="card b-radius--10">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Patient | Mobile</th>                  
                                <th>Booking Date</th>
                                <th>Time / Serial No</th>
                                <th>Doctor</th>
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
                                    <td>{{ $rowNumber}}</td>
                                    <td><span class="fw-bold d-block"> {{ __($appointment->name) }}</span>
                                        {{ $appointment->mobile }}</td>
                                    <td>{{ showDateTime($appointment->booking_date) }}</td>
                                    <td>{{ $appointment->time_serial }}</td>
                                    <td>{{ @$appointment->doctor->name }}</td>
                                    <td>@php echo $appointment->paymentBadge; @endphp</td>
                                    <th>@php echo $appointment->serviceBadge; @endphp</th>
                                    <td>
                                        <div class="button--group">
                                            <button class="btn btn-sm btn-outline--primary detailBtn"
                                                data-route=""
                                                data-resourse="{{ $appointment }}">
                                                <i class="las la-desktop">Details</i> 
                                            </button>
                                            
                                            <button type="button"
                                                class="btn btn-sm btn-outline--danger confirmationBtn"
                                                
                                                data-action=""
                                                data-question="Are you sure to remove this appointment ?">
                                                <i class="la la-trash"></i> Trash
                                            </button>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            @if (@$appointments->hasPages())
                <div class="card-footer py-4">
                    @php echo paginateLinks(@$appointments) @endphp
                </div>
            @endif
        </div>
    </div>
</div>

        @include('partials.appointment_done')

@endsection

@push('breadcrumb-plugins')

    <a href="{{ route('staff.appointment.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
        <i class="las la-plus"></i>@lang('Make New')
    </a>
@endpush