@extends('doctor.layouts.abc')
@section('panel')
<div class="row">
        <div class="col-lg-12">
            <form action="{{ route('doctor.schedule.update') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                    <label>Slot Type</label>
                                    <select name="slot_type" id="slot-type" class="form-control" required>
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1" @selected($doctor->slot_type == 1)>Serial</option>
                                        <option value="2" @selected($doctor->slot_type == 2)>Time</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                    <label>For How Many Days
                                        <i class="fa fa-info-circle text--primary" title="@lang('This will define that your appointment booking will be taken for the next how many days including today. That means with everyday it will add your given value.')">
                                    </i>
                                </label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="serial_day"
                                            value="{{ $doctor->serial_day }}" required>
                                        <span class="input-group-text">Days</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-6 start d-none">
                                <div class="form-group">
                                    <label>Start Time</label>
                                    <div class="input-group">
                                        <input type="text" name="start_time"
                                            value="{{ old('start_time', $doctor->start_time) }}"
                                            class="form-control time-picker" autocomplete="off">
                                        <span class="input-group-text"><i class="las la-clock"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-6 end d-none">
                                <div class="form-group">
                                    <label>End Time</label>
                                    <div class="input-group">
                                        <input type="text" name="end_time"
                                            value="{{ old('end_time', $doctor->end_time) }}"
                                            class="form-control time-picker" autocomplete="off">
                                        <span class="input-group-text"><i class="las la-clock"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 duration d-none">
                                <div class="form-group">
                                    <label>Time Duration</label>
                                    <div class="input-group">
                                        <input type="text" name="duration" class="form-control"
                                            value="{{ old('duration', $doctor->duration) }}">
                                            <span class="input-group-text">Minutes</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-12 serial d-none">
                                <div class="form-group">
                                    <label> Maximum Serial</label>
                                    <input type="text" class="form-control" name="max_serial"
                                        value="{{ old('max_serial', $doctor->max_serial) }}">
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn--primary w-100 h-45">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-none-30 mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-none-30 mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($doctor->slot_type && $doctor->serial_or_slot)
                        <h4>System of Current schedule</h4>
                        <hr>
                        <div class="mt-4">
                            @foreach ($slots as $item)
                                <button type="button" class="btn btn--primary">{{ $item }}</button>
                            @endforeach
                        </div>
                    @else
                        <h5 class="text-center">You Have no schedule</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/datepicker.min.css') }}" />
@endpush

@push('script-lib')
    <script src="{{ asset('public/admin/assets/vendor/js/datepicker.min.js') }}"></script>
@endpush

@push('script')
    <script>
        (function($) {
            'use strict';

            $('select[name=slot_type').on('change', function() {
                var type = $(this).val();
                schedule(type);
            })

            var type = $('select[name=slot_type]').val();
            if (type) {
                schedule(type);
            }

            function schedule(type) {
                if (type == 1) {
                    $('.duration').addClass('d-none');
                    $('.serial').removeClass('d-none');
                    $('.start').addClass('d-none');
                    $('.end').addClass('d-none');
                }
            }

            initTimePicker();

            function initTimePicker() {
                var start = new Date();
                start.setHours(9);
                start.setMinutes(0);

                $('.time-picker').datepicker({
                    onlyTimePicker: true,
                    timepicker: true,
                    startDate: start,
                    minHours: 0,
                    maxHours: 23,

                });
            }
        })(jQuery);
    </script>
@endpush