@extends('doctor.layouts.abc')
@section('panel')
<div class="row mb-none-30">
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary align-items-center">
                        <div class="avatar avatar--lg">
                            <img src="{{ getImage(getFilePath('doctorProfile').'/'. $doctor->image,getFileSize('doctorProfile'))}}" alt="@lang('Image')">
                        </div>
                        <div class="ps-3">
                            <h4 class="text--white"></h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Name
                            <span class="fw-bold">{{ $doctor->name }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Username
                            <span  class="fw-bold">{{ $doctor->username }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Email
                            <span  class="fw-bold">{{ $doctor->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Mobile
                            <span  class="fw-bold">{{ $doctor->mobile }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Department
                            <span  class="fw-bold">{{ $doctor->department->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Location
                            <span  class="fw-bold">{{ $doctor->location->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Qualification
                            <span  class="fw-bold">{{ $doctor->qualification }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Fees
                            <span  class="fw-bold">{{ $doctor->fees }}$</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-50 border-bottom pb-2">Profile Information</h5>

                    <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row d-flex justify-content-center items-center">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url({{ getImage(getFilePath('doctorProfile').'/'.@$doctor->image,getFileSize('doctorProfile')) }})">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">Upload Image</label>
                                                <small class="mt-2  ">Supported files: <b>jpeg, jpg.</b> Image will be resized into 400x400px </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection