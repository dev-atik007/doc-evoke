@extends('admin.layouts.abc')

@section('panel')

<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.frontend.contact.update', $bannerSections->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group ">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" required value="{{ $bannerSections->email }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group ">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="phone" required value="{{ $bannerSections->phone }}">
                            </div>
                        </div>
    
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn--primary w-60 h-45">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection