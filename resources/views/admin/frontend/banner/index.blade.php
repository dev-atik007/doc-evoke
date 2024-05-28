@extends('admin.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Sub Heading</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                <tr>
                    <td>1</td>
                    <td>
                        <img src="{{ getImage(getFilePath('banner') . '/' . @$bannerSection->image) }}" class="img-thumbnail rounded" style="width:50px" alt="@lang('Image')">
                    </td>
                    <td>{{ $bannerSection->heading }}</td>
                    <td>{{ $bannerSection->subheading }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline--primary editBtn" data-info="{{ $bannerSection }}"> <i class="las la-check-circle"></i>
                            Edit
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card-footer py-4">

    </div>

</div>



<!--Cu Modal -->
<div id="headingModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.frontend.banner.section.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
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
                        <div class="col-lg-6">
                        <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="heading" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Heading</label>
                                <input type="text" name="heading" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Sub Heading</label>
                                <textarea name="sub_heading" rows="10" class="form-control" required></textarea>
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




<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
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
                                    
                                        <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg" >
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
                            <label>Heading</label>
                            <input type="text" name="heading" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Sub Heading</label>
                            <textarea name="sub_heading" rows="10" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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

        let addModal  = $("#headingModal");
        let editModal = $("#editModal");

        $('.addBtn').on("click", function() {
            addModal.modal("show");
        });

        $('.editBtn').on("click", function() {
            let info = $(this).data('info');
            // console.log(info);
            let imagePath = "{{url('/')}}"+ '/' +"{{getFilePath('banner')}}" + '/' + info.image;


            let editUrl = "{{url('/')}}"+'/admin/frontend/banner-section/'+ info.id;
                // console.log(editModal.find('form'));

            editModal.find('form').attr('action',editUrl);

            editModal.find('.imagePathSet').attr('src',imagePath);
            editModal.find('[name=heading]').val(info.heading);
            editModal.find('[name=sub_heading]').val(info.subheading);
            editModal.modal("show");
        });
    })(jQuery);
</script>
@endpush