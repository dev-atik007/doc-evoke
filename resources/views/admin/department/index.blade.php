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
                @forelse($departments as $key=>$department)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>

                        <img src="{{ getImage(getFilePath('department') . '/' . $department->image, getFileSize('department')) }}" class="img-thumbnail rounded" style="width:50px" alt="@lang('Image')">

                    </td>
                    <td>{{ $department->name }} </td>
                    <td>{{ Str::limit ($department->details, 30) }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-label-primary editBtn" data-resource="" data-image="" data-action="">
                            <span class="btn btn-primary btn-sm">Edit</span>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-muted text-center" colspan="100">$emptyMessage</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if ($departments->hasPages())
    <div class="card-footer py-4">
        @php echo paginateLinks($departments) @endphp
    </div>
    @endif
</div>


<!--Cu Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.department.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>@lang('Image')</label>
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: ">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
                                            <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                            <small class="mt-2 ">@lang('Supported files'):
                                                <b>@lang('png'),@lang('jpg'),@lang('jpeg').</b>
                                                Image will be resized into department </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>@lang('Name')</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>@lang('Details')</label>
                                <textarea name="details" rows="10" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
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
                                        <div class="profilePicPreview" style="background-image: ">
                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
                                        <label for="profilePicUpload1" class="bg--success">Upload Image</label>
                                        <small class="mt-2 ">Supported files:
                                            <b>png,@lang('jpg'),jpeg.</b>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('breadcrumb-plugins')

<button type="button" class="btn btn-sm btn-outline--primary h-45 addBtn"> <i class="las la-plus"></i>Add New
</button>
@endpush

@push('script')
<script>
    (function($) {
        "use strict";

        let addModal = $("#myModal");
        let editModal = $("#editModal");


        $('.addBtn').on("click", function() {
            addModal.modal("show");
        });

        $('.editBtn').on('click', function() {
            editModal.modal("show");
        })


        $('.editBtn').on('click', function() {
            $('#cuModal').find('[name=image]').removeAttr('required');
            $('#cuModal').find('[name=image]').closest('.form-group').find('label').first().removeClass('required');
        });



        $('#editBtn').on('hidden.bs.modal', function() {
            $('#cuModal').find('.profilePicPreview').css({
                'background-image': `url(${placeHolderImage})`
            });
            $('#cuModal').find('[name=image]').attr('required', 'required');
            $('#cuModal').find('[name=image]').closest('.form-group').find('label').first().addClass('required');
        });

    })(jQuery);
</script>
@endpush