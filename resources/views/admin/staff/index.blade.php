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
                        {{ $staff->created_at }} <br>
                        {{ $staff->created_at }}
                    </td>
                    <td> @php echo $staff->statusBadge @endphp </td>
                    <td>
                        <div class="button--group">
                            <a href=""
                                class="btn btn-sm btn-outline--primary">
                                <i class="las la-desktop"></i> @lang('Details')
                            </a>

                    
                                <button type="button"
                                    class="btn btn-sm btn-outline--danger confirmationBtn"
                                    data-action=""
                                    data-question="@lang('Are you sure to Inactive this staff?')">
                                    <i class="la la-eye-slash"></i> @lang('Inactive')
                                </button>
                          
                                <button type="button"
                                    class="btn btn-sm btn-outline--success ms-1 confirmationBtn"
                                    data-action=""
                                    data-question="@lang('Are you sure to Active this staff?')">
                                    <i class="la la-eye"></i> @lang('Active')
                                </button>
                           
                        </div>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

@push('breadcrumb-plugins')

<a href="{{ route('admin.staff.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>
@endpush