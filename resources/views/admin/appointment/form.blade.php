@extends('admin.layouts.abc')
@section('panel')
<div class="row mb-none-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.appointment.book.details') }}">
                    <div class="form-group">
                        <label>Select Doctor</label>
                        <select name="doctor_id" class="select2-basic" required>
                            <option selected disabled></option>
                            @foreach ($doctors as $doctor)
                                <option @selected($doctor->id == @$appointment->doctor_id) value="{{ $doctor->id }}">
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- <div class="alert alert-warning d-flex align-items-center p-3" role="alert">
                        <i class="las la-exclamation-circle"></i>
                        <small>
                            This appointment service must be paid in cash.
                        </small>
                    </div> -->
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection