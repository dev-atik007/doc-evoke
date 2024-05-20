@extends('assistant.layouts.abc')

@section('panel')

<div class="row mb-none-30">
    <div class="col-xl-3 col-lg-4 mb-30">
        <div class="card b-radius--5 overflow-hidden">
            <div class="card-body">
                <div class="form-group">
                    <div class="image-upload">
                        <div class="thumb">
                            <div class="avatar-preview">
                                <div class="profilePicPreview"
                                    style="background-image: url({{ getImage(getFilePath('doctorProfile').'/'.@$doctor->image,getFileSize('doctorProfile')) }})">
                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card b-radius--5 overflow-hidden mt-4">
            <div class="card-body p-0">
                <h3 class="p-3">Doctor Information</h3>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                            Doctor
                        <span class="fw-bold">{{ $doctor->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Username
                        <span class="fw-bold">{{ $doctor->username }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Email
                        <span class="fw-bold">{{ $doctor->email }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                         Status
                        <span class="fw-bold">@php echo $doctor->statusBadge($doctor->status) @endphp</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Feature
                        <span class="fw-bold">
                            @if($doctor->featured == 1)
                            <button type="button" class="btn btn-sm btn-outline--danger confirmationBtn" data-action="" data-question="@lang('Are you sure to NonFeature this doctor?')">
                                <i class="la la-eye-slash"></i>NonFeature
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-outline--success ms-1 confirmationBtn" data-action="{{ route('admin.doctor.featured', $doctor->id) }}" data-question=" Are you sure to featured this doctor?">
                                <i class="la la-eye"></i> Featured
                            </button>
                        @endif
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Department
                        <span class="fw-bold">{{ $doctor->department->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                         Location
                        <span class="fw-bold">{{ $doctor->location->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Fees
                        <span class="fw-bold">{{ $doctor->fees }}$</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="col-xl-9 col-lg-8 mb-30">
        <form action="{{ route('assistant.doctor.appointment.store', $doctor->id) }}" method="post">
            @csrf
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <div class="widget-two box--shadow2 b-radius--5 bg--white mb-4">
                            <i class="far fa-clock overlay-icon text--primary"></i>
                            <div class="widget-two__icon b-radius--5 bg--primary">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="widget-two__content">
                                @if (($doctor->start_time == null || $doctor->end_time == null) && $doctor->max_serial)
                                    <h3>{{ $doctor->max_serial }}</h3>
                                    <p>Limit off serial</p>
                                @elseif ($doctor->start_time && $doctor->end_time)
                                    <h3>{{ $doctor->start_time }} - {{ $doctor->end_time }}</h3>
                                    <p>Limit Of Time</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-2 date-label">Select Date</label>
                            <select name="booking_date" class="form-control" required>
                                <option selected disabled>Select One</option>
                                    @foreach ($availableDate as $date)
                                        <option value="{{ $date }}">{{ $date }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <h3 class="py-2">Available Schedule</h3>
                        <hr>
                        <div class="time-serial-parent mt-3">
                            @foreach ($doctor->serial_or_slot as $item)
                                <button type="button" class="btn btn--primary mr-2 mb-2 available-time item-{{ slug($item) }}"
                                    data-value="{{ $item }}">{{ $item }}
                                </button>
                            @endforeach
                        </div>
                        <input type="hidden" name="time_serial" required>
                    </div>
                </div>
            </div>

            <div class="card b-radius--10 overflow-hidden box--shadow1 mt-4">
                <div class="card-body p-0">
                    <div class="row p-3 bg--white">
                        <h3 class="py-2">Patient Information</h3>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Age</label>

                                <div class="input-group">
                                    <input type="number" name="age" step="any" class="form-control"
                                        value="{{ old('age') }}" required>
                                    <span class="input-group-text">
                                        Years
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Mobile
                                    <i class="fa fa-info-circle text--primary" title="@lang('Add the country code by general setting. Otherwise, SMS won\'t send to that number.')">
                                    </i>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">{{ $general->country_code }}</span>
                                    <input type="number" name="mobile" value="{{ old('mobile') }}"
                                        class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Disease Details</label>
                            <textarea name="disease" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";

            $(".available-time").on('click', function () {
                $(this).parent('.time-serial-parent').find('.btn--success').removeClass(
                    'btn--success disabled').addClass('btn--primary');

                    $('[name=time_serial]').val($(this).data('value'));
                    $(this).removeClass('btn--primary');
                    $(this).addClass('btn--success disabled');
            })

            function slug(text) {
                return text.toLowerCase().replace(/[^\w-]+/g, '');
            }

            $("select[name=booking_date]").on('change', function() {
                $('.available-time').removeClass('btn--success disabled').addClass('btn--primary');

                let url  = "{{ route('assistant.doctor.appointment.available.date') }}"
                let data = {
                    data      : $(this).val(),
                    doctor_id : '{{ $doctor->id }}'
                }

                $.get(url,data, function(response) {
                    $('[name=time_serial]').val('');

                    if (response.length == 0){
                        $('.available-time').removeClass('btn--danger disabled');
                    } else {
                        $.each(response, function(key, value) {
                            var demo = slug(value);
                            $(`.item-${demo}`).addClass('btn--danger disabled');
                        });
                    }
                });
            });
        })(jQuery);
    </script>
@endpush

