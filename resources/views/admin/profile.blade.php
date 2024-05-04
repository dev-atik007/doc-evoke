@extends('admin.layouts.master')
@section('content')

<div class="row mb-none-30">
    <div class="col-xl-3 col-lg-4 mb-30">

        <div class="card b-radius--5 overflow-hidden">
            <div class="card-body p-0">
                <div class="d-flex p-3 bg--primary align-items-center">
                    <div class="avatar avatar--lg">
                        <img src="url({{ getImage(getFilePath('adminProfile').'/'.@$admin->image,getFileSize('adminProfile')) }})" alt="">
                    </div>
                    <div class="ps-3">
                        <h4 class="text--white">{{ $admin->name }}</h4>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        name
                        <span class="fw-bold">{{ $admin->name }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        username
                        <span class="fw-bold">{{ $admin->username }}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        email
                        <span class="fw-bold">{{ $admin->email }}</span>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-9 col-lg-8 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 border-bottom pb-2">Profile Information</h5>

                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf



                    <div class="row">

                        <div class="col-xl-6 col-lg-12 col-md-6">

                            <div class="form-group">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: url({{ getImage(getFilePath('adminProfile').'/'.@$admin->image,getFileSize('adminProfile')) }})">
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
                        <div class="col-xl-6 col-lg-12 col-md-6">
                            <div class="form-group ">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $admin->name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $admin->email }}" required>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn--primary h-45 w-100">Submit</button> -->
                    <button type="submit" class=" btn btn-primary h-45 w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection