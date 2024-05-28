@extends('admin.layouts.abc')
@section('panel')

<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.R</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @forelse ($whyChooseIndex as $key=>$data)
                  <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $data->icon }}</td>
                    <td>{{ $data->heading }}</td>
                    <td>{{ $data->details }}</td>
                    <td>
                        <a href="{{ route('choose.edit', $data->id) }}" class="btn btn-sm btn-outline--primary">Edit</a>
                        <a href="" class="btn btn-sm btn-outline--danger">Remove</a>
                    </td>
                  </tr>
              @empty
                  <h1>Data Not Found</h1>
              @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">

    </div>
</div>
@endsection

@push('breadcrumb-plugins')

<a href="{{ route('choose.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>

@endpush