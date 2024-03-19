@extends('admin.layouts.abc')
@section('panel')

<div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label>Site Title</label>
                                    <input class="form-control" type="text" name="site_name" required value="{{$general->site_name}}">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label>Currency</label>
                                    <input class="form-control" type="text" name="cur_text" required value="{{$general->cur_text}}">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label>Currency Symbol</label>
                                    <input class="form-control" type="text" name="cur_sym" required value="{{$general->cur_sym}}">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-4 col-sm-6">
                                <label> Site Country Code</label>
                                    <input type="text" class="form-control" name="country_code" value="{{ $general->country_code }}"/>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection