@extends('admin.layouts.abc')
@section('panel')


<div class="card">

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($locations as $location)
                <tr>
                    <td>{{ $locations->firstItem() + $loop->index }}</td>
                    <td>{{ $location->name }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline--primary editBtn cuModalBtn" data-resource="location" data-modal_title="Edit Location" data-has_status="1">
                            <i class="la la-pencil"></i>Edit
                        </button>
                    </td>
                </tr>
                @empty
                <tr class="text-muted text-center" colspan="100%">$emptyMessage</tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($locations->hasPages())
    <div>
        @php
            echo paginateLinks($locations)
        @endphp
    </div>
    @endif
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
            <form action="{{ route('admin.department.location.store') }}" method="POST" enctype="multipart/form-data">
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
@endsection

@push('breadcrumb-plugins')


<button type="button" class="btn btn-sm btn-outline--primary h-45 cuModalBtn" data-modal_title="Add New Department"> <i class="las la-plus"></i>Add New
</button>
@endpush