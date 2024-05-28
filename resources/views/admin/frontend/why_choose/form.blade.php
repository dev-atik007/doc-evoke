@extends('admin.layouts.abc')
@section('panel')
<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('choose.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="icon">Icon:</label>
                            <input type="text" id="icon" name="icon" class="form-control icon-picker" required>
                        </div>

                        <div class="col-md-12 col-sm-6">
                            <div class="form-group ">
                                <label>Heading</label>
                                <input class="form-control" type="text" name="heading" required value="">
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group ">
                                <label>Details</label>
                                <input class="form-control" type="text" name="details" required value="">
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
<a href="{{ route('why.choose') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> - Back
</a>
@endpush