@extends('admin.layouts.abc')
@section('panel')
    <div class="row mb-4 g-3">
    <div class="col-sm-6 col-xl-3">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
            <div class="content-left">
                <h3 class="mb-0">$24,983</h3>
                <small>Total Earning</small>
            </div>
            <span class="badge bg-label-primary rounded-circle p-2">
                <i class="bx bx-dollar bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
            <div class="content-left">
                <h3 class="mb-0">$8,647</h3>
                <small>Unpaid Earning</small>
            </div>
            <span class="badge bg-label-success rounded-circle p-2">
                <i class="bx bx-gift bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
            <div class="content-left">
                <h3 class="mb-0">2,367</h3>
                <small>Signups</small>
            </div>
            <span class="badge bg-label-danger rounded-circle p-2">
                <i class="bx bx-user bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
            <div class="content-left">
                <h3 class="mb-0">4.5%</h3>
                <small>Conversion Rate</small>
            </div>
            <span class="badge bg-label-info rounded-circle p-2">
                <i class="bx bx-infinite bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
            <div class="content-left">
                <h3 class="mb-0">$24,983</h3>
                <small>Total Earning</small>
            </div>
            <span class="badge bg-label-primary rounded-circle p-2">
                <i class="bx bx-dollar bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
            <div class="content-left">
                <h3 class="mb-0">$8,647</h3>
                <small>Unpaid Earning</small>
            </div>
            <span class="badge bg-label-success rounded-circle p-2">
                <i class="bx bx-gift bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
            <div class="content-left">
                <h3 class="mb-0">2,367</h3>
                <small>Signups</small>
            </div>
            <span class="badge bg-label-danger rounded-circle p-2">
                <i class="bx bx-user bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
            <div class="content-left">
                <h3 class="mb-0">4.5%</h3>
                <small>Conversion Rate</small>
            </div>
            <span class="badge bg-label-info rounded-circle p-2">
                <i class="bx bx-infinite bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>


    <div class="d-flex flex-wrap gap-3 mt-4">
                <div class="flex-fill">
                    <a href="" class="btn btn--primary w-100 btn-lg">
                        <i class="las la-history"></i>Login History
                    </a>
                </div>
                <div class="flex-fill">
                    <a href=""
                        class="btn btn--warning w-100 btn-lg">
                        <i class="las la-envelope"></i>Notification Logs
                    </a>
                </div>
                <div class="flex-fill">
                    <a href="" target="_blank"
                        class="btn btn--primary btn--gradi w-100 btn-lg">
                        <i class="las la-sign-in-alt"></i>Login as Doctor
                    </a>
                </div>
            </div>
    </div>

    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview"
                                                        style="background-image: url({{ getImage(getFilePath('doctorProfile') . '/' . @$doctor->image, getFileSize('doctorProfile')) }}) ">
                                                        <button type="button" class="remove-image"><i
                                                                class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit mt-0">
                                                    <input type="file" class="profilePicUpload" name="image"
                                                        id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
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
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control " required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" value="{{ old('username') }}"
                                                class="form-control " required />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" name="email" value="{{ old('email') }}"
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
                                                <input type="number" name="mobile" value="{{ old('mobile') }}"
                                                    class="form-control" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group select2-wrapper" id="select2-wrapper-one">
                                            <label>Department</label>
                                            <select class="select2-basic-one form-control" name="department" required>
                                                <option disabled selected>Select One</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group select2-wrapper" id="select2-wrapper-two">
                                            <label>Location</label>
                                            <select class="select2-basic-two form-control" name="location" required>
                                                <option disabled selected>Select One</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Fees</label>
                                            <div class="input-group">
                                                <span class="input-group-text">{{ $general->cur_sym }}</span>
                                                <input type="number" name="fees" value="{{ old('fees') }}"
                                                    class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Qualification</label>
                                            <input type="text" name="qualification" value="{{ old('qualification') }}"
                                                class="form-control" required />

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Address</label>
                                            <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> About</label>
                                    <textarea name="about" class="form-control" required>{{ old('about') }}</textarea>
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

@push('breadcrumb-plugins')
    <a href="{{ route('admin.doctor.index') }}" class="btn btn-sm btn-outline--primary"><i class="la la-undo"></i>
    Back </a>
@endpush