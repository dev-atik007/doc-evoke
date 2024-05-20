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
            @foreach($appointments as $appointment )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $appointment->name }} <br> {{ $appointment->mobile }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>@php echo $appointment->addedByBadge; @endphp</td>
                    <td>{{ showDateTime($appointment->booking_date) }}</td>
                    <td>{{ $appointment->time_serial }}</td>
                    <td>@php echo $appointment->paymentBadge; @endphp</td>
                    <td>@php echo $appointment->serviceBadge; @endphp</td>
                    <td>
                        <button class="btn btn-sm btn-outline--primary detailBtn"  data-resourse="{{ $appointment }}">
                            <i class="las la-desktop"></i> Details
                        </button>
                    </td>
                </tr>
                @endforeach()
                
            </tbody>
        </table>

    </div>
</div>
@endsection