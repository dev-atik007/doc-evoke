@extends('admin.layouts.abc')
@section('panel')

<div class="row mb-none-30">
    <div class="col-lg-12 col-md-12 mb-30">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('section.update', $description->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-2"> 
                        <div class="form-group ">
                            <div class="form-group">
                                <label>Why Choose</label>
                                <textarea id="service" name="why_choose" class="form-control" cols="30" rows="4">{{ old('why_choose', $description->why_choose ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>About Section</label>
                                <textarea id="service" name="about_section" class="form-control" cols="30" rows="4">{{ old('about_section', $description->about_section ?? '') }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Service</label>
                                <textarea id="service" name="service" class="form-control" cols="30" rows="4">{{ old('service', $description->service ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Appointment</label>
                                <textarea id="appointment" name="appointment" class="form-control" cols="30" rows="4">{{ old('appointment', $description->appointment ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Departments</label>
                                <textarea  name="department" class="form-control" colum="30" rows="4">{{ old('department', $description->department ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Doctors</label>
                                <textarea  name="doctor" class="form-control" colum="30" rows="4">{{ old('doctor', $description->doctor ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Frequently</label>
                                <textarea  name="frequently" class="form-control" colum="30" rows="4">{{ old('frequently', $description->frequently ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Gallery</label>
                                <textarea  name="gallery" class="form-control" colum="30" rows="4">{{ old('gallery', $description->gallery ?? '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <textarea  name="contact" class="form-control" colum="30" rows="4">{{ old('contact', $description->contact ?? '') }}</textarea>
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