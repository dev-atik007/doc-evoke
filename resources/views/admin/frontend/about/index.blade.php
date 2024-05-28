@extends('admin.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
                
            <thead>
                <tr>
                    <th>S.R</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>About</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aboutSection as $key=>$data)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $data->icon }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ Str::limit($data->about, 30) }}</td>
                        <td>
                        <a href="{{ route('about.edit', $data->id) }}" class="btn btn-sm btn-outline--primary">Edit</a>
                        <a href="{{ route('about.delete', $data->id) }}" onclick="return confirm('Are You Sure To Delete This')" class="btn btn-sm btn-outline--danger">Remove</a>
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

<a href="{{ route('about.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>

@endpush

@push('script')
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
                    
    @endif
@endpush