@extends('admin.layouts.abc')
@section('panel')

<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Assistant</th>
                    <th>Mobile | Email</th>
                    <th>Joined At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assistants as $key=>$assistant)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            <span class="fw-bold">{{ $assistant->name }}</span>
                            <br>
                            <small>
                                <a href=""><span>@</span>{{ $assistant->username }}</a>
                            </small>
                        </td>
                        <td><span class="d-block fw-bold">{{$general->country_code . $assistant->mobile }}</span> {{ $assistant->email }}</td>
                        <td>
                            {{ showDateTime($assistant->created_at) }} <br>
                            {{ diffForHumans($assistant->created_at) }}
                        </td>
                        <td> @php echo $assistant->statusBadge($assistant->status) @endphp </td>
                        <td>
                            <div class="button--group">
                                <a href="{{ route('admin.assistant.detail', $assistant->id) }}"
                                    class="btn btn-sm btn-outline--primary">
                                    <i class="las la-desktop"></i> Details
                                </a>  
                                @if($assistant->status == 1)
                                    <button type="button"
                                        class="btn btn-sm btn-outline--danger confirmationBtn"
                                        data-action="{{ route('admin.assistant.status', $assistant->id) }}"
                                        data-question="Are you sure to inactive this assistant?">
                                        <i class="la la-eye-slash"></i> Inactive
                                    </button>
                                @else
                                    <button type="button"
                                        class="btn btn-sm btn-outline--success ms-1 confirmationBtn"
                                        data-action="{{ route('admin.assistant.status', $assistant->id) }}"
                                        data-question="Are you sure to active this assistant?">
                                        <i class="la la-eye"></i> Active
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $assistants->links() }}
    </div>
</div>

<x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')

<a href="{{ route('admin.assistant.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>
@endpush