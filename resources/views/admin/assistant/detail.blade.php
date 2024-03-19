@extends('admin.layouts.abc')
@section('panel')
<div class="row">
        <div class="col-12">
            <div class="row gy-4">
                <div class="col-xxl-3 col-sm-6">
                    <x-widget
                    link="#"
                    icon="las la-stethoscope f-size--56"
                    title="Total Assign Doctors"
                    value="{{ $totalDoctors }}"
                    bg="19"
                    />
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <x-widget
                    link="#"
                    icon="las la-hands-helping f-size--56"
                    title="Total Appointments"
                    value="{{ $totalAppointment }}"
                    bg="11"
                    />
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <x-widget
                    link="#"
                    icon="las la-check-circle f-size--56"
                    title="Total Completed Appointments"
                    value="{{ $completeAppointment }}"
                    bg="success"
                    />
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <x-widget
                    link="#"
                    icon="las la-handshake f-size--56"
                    title="Total New Appointments"
                    value="{{ $newAppointment }}"
                    bg="19"
                    />
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <div class="flex-fill">
                    <a href=""
                        class="btn btn--primary btn--shadow w-100 btn-lg">
                        <i class="las la-history"></i>@lang('Login History')
                    </a>
                </div>
                <div class="flex-fill">
                    <a href=""
                        class="btn btn--warning btn--shadow w-100 btn-lg">
                        <i class="las la-envelope"></i>@lang('Notification Logs')
                    </a>
                </div>

                <div class="flex-fill">
                    <a href="" target="_blank"
                        class="btn btn--primary btn--gradi btn--shadow w-100 btn-lg">
                        <i class="las la-sign-in-alt"></i>@lang('Login as Assistant')
                    </a>
                </div>
            </div>

            <div class="card mt-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">@lang('Information of') {{ $assistant->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('Image')</label>
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview"
                                                        style="background-image: ">
                                                        <button type="button" class="remove-image"><i
                                                                class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit mt-0">
                                                    <input type="file" class="profilePicUpload" name="image"
                                                        value="{{ $assistant->image }}" id="profilePicUpload1"
                                                        accept=".png, .jpg, .jpeg">
                                                    <label for="profilePicUpload1"
                                                        class="btn btn--success btn-block btn-lg">Upload</label>
                                                    <small>Support Images:
                                                        <b>jpeg, jpg.</b> resized into 400x400px
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{ $assistant->name }}"
                                                class="form-control " required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" value="{{ $assistant->username }}"
                                                class="form-control " required />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" name="email" value="{{ $assistant->email }}"
                                                class="form-control " required />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Mobile
                                                <i class="fa fa-info-circle text--primary" title="@lang('Add the country code by general setting. Otherwise, SMS won\'t send to that number.')">
                                                </i>
                                            </label>

                                            <div class="input-group">
                                                <span class="input-group-text">{{ $general->country_code }}</span>
                                                <input type="number" name="mobile" value="{{ str_replace($general->country_code, '', $assistant->mobile) }}" class="form-control" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group" id="select2-wrapper">
                                            <label>@lang('Assign Doctors')</label>
                                            <select class="select2-multi-select form-control" name="doctor_id[]"
                                                multiple="multiple" required>
                                                <option disabled>Select One</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="from-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" required>{{ $assistant->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn--primary w-100 h-45">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection