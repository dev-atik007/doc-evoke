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
                    <th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                <tr>
                    <td>1</td>
                    <td>Al</td>
                    <td>Albert Cook</td>
                    <td>vgybhunjmk,l</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!--Cu Modal -->
<div id="cuModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{ route('admin.department.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image:  }})">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
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
                                <label>Details</label>
                                <textarea name="details" rows="10" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary h-45 w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')


<button type="button" class="btn btn-sm btn-outline--primary h-45 cuModalBtn" data-modal_title="Add New Department"> <i class="las la-plus"></i>Add New
</button>
@endpush

@push('script')
<script>
    (function($) {
        "use strict";

        $('.editBtn').on('click', function() {
            $('#cuModal').find('[name=image]').removeAttr('required');
            $('#cuModal').find('[name=image]').closest('.form-group').find('label').first().removeClass('required');
        });

      

        $('#cuModal').on('hidden.bs.modal', function() {
            $('#cuModal').find('.profilePicPreview').css({
                'background-image': `url(${placeHolderImage})`
            });
            $('#cuModal').find('[name=image]').attr('required', 'required');
            $('#cuModal').find('[name=image]').closest('.form-group').find('label').first().addClass('required');
        });

    })(jQuery);
</script>
@endpush