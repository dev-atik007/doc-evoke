@extends('assistant.layouts.abc')
@section('panel')
<div class="row mb-none-30">
    <div class="col-lg-3 col-md-3 mb-30">
        <div class="card b-radius--5 overflow-hidden">
            <div class="card-body p-0">
                <div class="d-flex p-3 bg--primary">
                    <div class="avatar avatar--lg">
                        <img src="{{ getImage(getFilePath('assistantProfile').'/'. @$assistant->image,getFileSize('assistantProfile')) }}" alt="@lang('Image')">
                    </div>
                    <div class="ps-3">
                        <h4 class="text--white">{{ $assistant->name }}</h4>
                    </div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Name')
                        <span class="fw-bold">{{ $assistant->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Username')
                        <span  class="fw-bold">{{ $assistant->username }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Email')
                        <span  class="fw-bold">{{ $assistant->email }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-50 border-bottom pb-2">Change Password</h5>

                <form action="{{ route('assistant.password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="old_password" required>
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input class="form-control" type="password" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn--primary w-100 btn-lg h-45">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>   
@endsection