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
               @forelse ($services as $key=>$service)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $service->icon }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ Str::limit($service->description, 20) }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-outline--primary">Edit</a>
                            <a href="" class="btn btn-sm btn-outline--danger">Remove</a>
                        </td>
                    </tr>
               @empty
                       
               @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">

    </div>
</div>

@endsection

@push('breadcrumb-plugins')

<a href="{{ route('admin.service.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>

@endpush