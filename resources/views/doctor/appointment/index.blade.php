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
                
            </tbody>
        </table>
    </div>
    <div class="p-4">
       
    </div>
</div>
@endsection

@push('breadcrumb-plugins')
<a href="{{ route('doctor.appointment.booking') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>
@endpush




