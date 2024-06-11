@extends('admin.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($gallery as $key=>$data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ getImage(getFilePath('gallery') . '/' . $data->image, getFileSize('gallery')) }}" class="img-thumbnail rounded" style="width:50px" alt="@lang('Image')">
                    </td>
                    <td>
                        <div class="button--group">
                            <button class="btn btn-sm btn-outline--primary detailBtn" data-gallery="">
                                <i class="las la-desktop"></i> Details
                            </button>

                            <a href="" class="btn btn-sm btn-outline--danger">Remove</a>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer py-4">

    </div>
</div>


<!--Cu Modal -->
<div id="galleryModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg col-lg-6" role="document">
        <div class="modal-content col-lg-6">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel3">Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-6 d-flex justify-content-center">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: ">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary h-45 w-45">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Cu Modal -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg col-lg-6" role="document">
        <div class="modal-content col-lg-6">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel3">Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: ">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary h-45 w-45">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
<a type="button" class="btn btn-sm btn-outline--primary h-45 addBtn">
    <i class="las la-plus"></i>Make New
</a>
@endpush

@push('script')
<script>
    (function($) {
        "use strict"

        let addModal = $("#galleryModal");
        let editModal = $("#editModal");

        $('.addBtn').on("click", function() {
            addModal.modal("show");
        });

        $('.detailBtn').on("click", function() {
            editModal.modal("show");
        });
    })(jQuery);
</script>
@endpush