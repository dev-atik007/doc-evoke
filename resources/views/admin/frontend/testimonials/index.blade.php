@extends('admin.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Desination</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($testination as $key=>$data)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ getImage(getFilePath('testimonial') . '/' . $data->image, getFileSize('testimonial')) }}" class="img-thumbnail rounded" style="width:50px" alt="@lang('Image')">
                    </td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->destination }}</td>
                    <td>{{ Str::limit($data->description, 30) }}</td>
                    <td>
                        <div class="button--group">
                            <button class="btn btn-sm btn-outline--primary detailBtn"
                                    data-testimonial = "{{ $data }}">
                                <i class="las la-desktop"></i> Details
                            </button>

                            <a href="{{ route('testimonials.delete', $data->id) }}" class="btn btn-sm btn-outline--danger">Remove</a>
                               
                        </div>
                    </td>
                  </tr>  
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer py-4">

    </div>
</div> 

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Testimonial Update page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="modal-body">
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Image</label>
                            <div class="image-upload">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview" style="background-image: "><img src="" class="img-thumbnail rounded imagePathSet" style="width:355px" alt="@lang('Image')">
                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" class="profilePicUpload" name="image" id="image" accept=".png, .jpg, .jpeg" >
                                        <label for="profilePicUpload1" class="bg--success">Upload Image</label>
                                        <small class="mt-2 ">Supported files:
                                            <b>png,jpg,jpeg.</b>
                                            Image will be resized into department </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Destination</label>
                            <input type="text" name="destination" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" rows="10" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')

<a href="{{ route('testination.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>

@endpush

@push('script')
<script>
    (function($) {
        "use strict"

        let editModal = $("#editModal");
        
        $('.detailBtn').on("click", function() {
            let testimonial = $(this).data('testimonial');
            // console.log(testimonial);

            let imagePath = "{{ url('/') }}" + '/' +"{{ getFilePath('testimonial') }}" + '/' + testimonial.image;

            let editUrl = "{{ url('/') }}" + '/testination/store/' + testimonial.id;
            // console.log(editModal.find('form'),editUrl);

            editModal.find('form').attr('action',editUrl);

            editModal.find('.imagePathSet').attr('src',imagePath);
            editModal.find('[name=name]').val(testimonial.name);
            editModal.find('[name=destination]').val(testimonial.destination);
            editModal.find('[name=description]').val(testimonial.description);
            editModal.modal("show");
        })
    })(jQuery);
</script>
@endpush
