@extends('doctor.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-6">
                            <div class="form-group">
                                <label>Slot Type</label>
                                <select name="slot_type" id="slot-type" class="form-control" required>
                                   
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
                                        value="" required>
                                    <span class="input-group-text">Days</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-6 start d-none">
                            <div class="form-group">
                                <label>Start Time</label>
                                <div class="input-group">
                                    <input type="text" name="start_time"
                                        value=""
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
                                        value=""
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
                                        value="">
                                        <span class="input-group-text">Minutes</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-12 serial d-none">
                            <div class="form-group">
                                <label>Maximum Serial</label>
                                <input type="text" class="form-control" name="max_serial"
                                    value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45">Submit
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection