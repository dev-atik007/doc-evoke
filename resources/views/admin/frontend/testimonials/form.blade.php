@extends('admin.layouts.abc')
@section('panel')

<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('destination.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group ">
                                <label>Image</label>
                                <input class="form-control" type="file" name="image" required value="">
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group ">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" required value="">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group ">
                                <label>Destination</label>
                                <input class="form-control" type="text" name="destination" required value="">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group ">
                                <label>Description</label>
                                <input class="form-control" type="text" name="description" required value="">
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

@push('breadcrumb-plugins')

<a href="{{ route('testimonials') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> - Back
</a>

@endpush