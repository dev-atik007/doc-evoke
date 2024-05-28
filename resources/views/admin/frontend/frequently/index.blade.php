@extends('admin.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($frenquently as $key=>$data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->questions }}</td>
                        <td>{{ Str::limit($data->answer, 30) }}</td>
                        <td>
                            <div class="button--group">
                            <button class="btn btn-sm btn-outline--primary detailBtn"
                                    data-frequently = "{{ $data }}"><i class="las la-desktop"></i> Details                                
                            </button>
                            <a href="" class="btn btn-sm btn-outline--danger">Remove</a>                            
                            </div>
                        </td>
                    </tr>
                @empty
                    <h1>Data Not Found</h1>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer py-4">

    </div>
</div>


<!--Cu Modal -->
<div id="frequentlyModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('frequently.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <input type="text" name="answer" class="form-control" required>
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
<div class="modal fade" id="frequentlyEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Frequently Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="" method="POST" enctype="multipart/form-data" class="modal-body">
                @csrf

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" class="form-control" required>
                        </div>
            
                        <div class="form-group">
                            <label>Answer</label>
                            <textarea name="answer" rows="10" class="form-control" required></textarea>
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
<a  type="button" class="btn btn-sm btn-outline--primary h-45 addBtn">
    <i class="las la-plus"></i> + Make New</a>
@endpush


@push('script')
<script>
    (function($) {
        "use strict"

        let addModal = $("#frequentlyModal");
        let editModal= $("#frequentlyEdit");

        $('.addBtn').on("click", function() {
            addModal.modal("show");
        });

        $('.detailBtn').on("click", function() {
            let frequently = $(this).data('frequently');
            // console.log(frequently);

            let editUrl = "{{ url('/')}}" + '/frequently/update/' + frequently.id;
            console.log(editModal.find('form'),editUrl);
            editModal.find('form').attr('action',editUrl);
            
            editModal.find('[name=question]').val(frequently.questions);
            editModal.find('[name=answer]').val(frequently.answer);
            editModal.modal("show");
        })
    })(jQuery);
</script>
@endpush