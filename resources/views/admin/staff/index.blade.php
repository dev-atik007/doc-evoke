@extends('admin.layouts.abc')
@section('panel')

<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Staff</th>
                    <th>Mobile | Email</th>
                    <th>Joined At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($staffs as $key=>$staff)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <span class="fw-bold">{{ $staff->name }}</span>
                        <br>
                        <small>
                            <a href=""><span>@</span>{{ $staff->username }}</a>
                        </small>
                    </td>
                    <td><span class="d-block fw-bold">{{$general->country_code . $staff->mobile }}</span> {{ $staff->email }}</td>
                    <td>
                        {{ showDateTime($staff->created_at) }} <br>
                        {{ diffForHumans($staff->created_at) }}
                    </td>
                    <td> @php echo $staff->statusBadge($staff->status) @endphp </td>
                    <td>
                        <div class="button--group">
                            <a href="{{ route('admin.staff.detail', $staff->id) }}"
                                class="btn btn-sm btn-outline--primary">
                                <i class="las la-desktop"></i> @lang('Details')
                            </a>

                            @if($staff->status == 1)
                                <button type="button"
                                    class="btn btn-sm btn-outline--danger confirmationBtn"
                                    data-action="{{ route('admin.staff.status', $staff->id) }}"
                                    data-question="@lang('Are you sure to Inactive this staff?')">
                                    <i class="la la-eye-slash"></i> @lang('Inactive')
                                </button>
                                @else
                                <button type="button"
                                    class="btn btn-sm btn-outline--success ms-1 confirmationBtn"
                                    data-action="{{ route('admin.staff.status', $staff->id) }}"
                                    data-question="@lang('Are you sure to Active this staff?')">
                                    <i class="la la-eye"></i> @lang('Active')
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
        {{ $staffs->links() }}
    </div>
</div>

<x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')

<a href="{{ route('admin.staff.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>
@endpush