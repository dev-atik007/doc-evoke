@extends('admin.layouts.abc')
@section('panel')

<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('footer.section', $footer->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group ">
                                <label>Street</label>
                                <input class="form-control" type="text" name="street" required value="{{ $footer->street }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group ">
                                <label>City</label>
                                <input class="form-control" type="text" name="city" required value="{{ $footer->city }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group ">
                                <label>Country</label>
                                <input class="form-control" type="text" name="country" required value="{{ $footer->country }}">
                            </div>
                        </div>
     
                        
                        <div class="col-md-8 col-sm-6">
                            <div class="form-group ">
                                <label>Join Our Newsletter</label>
                                <input class="form-control" type="text" name="newsletter" required value="{{ $footer->newsletter }}">
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