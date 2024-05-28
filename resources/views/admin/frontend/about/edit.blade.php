@extends('admin.layouts.abc')
@section('panel')
<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('about.update', $aboutEdit->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="icon">Icon:</label>
                            <input type="text" id="icon" value="{{ $aboutEdit->icon }}" name="icon" class="form-control icon-picker" required>
                        </div>

                        <div class="col-md-12 col-sm-6">
                            <div class="form-group ">
                                <label>Name</label>
                                <input class="form-control" value="{{ $aboutEdit->name }}" type="text" name="name" required value="">
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-6">
                            <div class="form-group ">
                                <label>About</label>
                                <input class="form-control" value="{{ $aboutEdit->about }}" type="text" name="about" required value="">
                            </div>
                        </div>
    
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn--primary w-60 h-45">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection