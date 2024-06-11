@extends('admin.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Url</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                <tr>

                    <td>1</td>
                    <td>{{ $video->url }}</td>
                    <td>
                        <div class="button--group">
                            <button class="btn btn-sm btn-outline--primary editBtn" data-video="{{ $video }}">
                                <i class="las la-desktop"></i> Edit
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!--Cu Modal -->
<div id="editUrl" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Video Url</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary h-45 w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection


@push('script')
<script>
    (function($) {
        "use strict"

        let editModal = $("#editUrl")

        $(".editBtn").on("click", function() {
            let video = $(this).data('video');
            // console.log(video);

            let editUrl = "{{ url('/') }}" + '/video-content/update/' + video.id;

            editModal.find('form').attr('action', editUrl);

            editModal.find('[name=name]').val(video.url);
            editModal.modal("show");
        });

    })(jQuery);
</script>
@endpush