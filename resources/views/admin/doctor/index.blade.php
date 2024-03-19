@extends('admin.layouts.abc')
@section('panel')

<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Mobile | Email</th>
                    <th>Total Earning</th>
                    <th>Department | Location</th>
                    <th>Joined At</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                <tr>
                    <td>
                        <span>{{ $doctor->name }}</span>
                        <br>
                        <small>
                            <a href=""><span>@</span>{{ $doctor->username }}</a>
                        </small>
                    </td>
                    <td><span>{{ $general->country_code . $doctor->mobile }}</span>{{ $doctor->email }}</td>
                    <td>100 {{ $general->cur_text }}</td>
                    <td>
                        <span>{{ $doctor->department->name }} </span>

                    </td>
                    <td>
                        {{ showDateTime($doctor->created_at) }} <br>
                        {{ diffForHumans($doctor->created_at) }}
                    </td>
                    <td> </td>
                    <th>@php echo $doctor->statusBadge($doctor->status) @endphp</th>
                    <th>
                        <div class="button--group">
                            <a href="" class="btn btn-sm btn-outline--primary">
                                <i class="las la-desktop"></i> @lang('Details')
                            </a>

                            <button type="button" class="btn btn-sm btn-outline--danger confirmationBtn" data-action="" data-question="@lang('Are you sure to NonFeature this doctor?')">
                                <i class="la la-eye-slash"></i> @lang('NonFeature')
                            </button>

                            <button type="button" class="btn btn-sm btn-outline--success ms-1 confirmationBtn" data-action="" data-question="@lang('Are you sure to featured this doctor?')">
                                <i class="la la-eye"></i> @lang('Featured')
                            </button>

                            @if($doctor->status == 1)
                            <button type="button" class="btn btn-sm btn-outline--danger confirmationBtn" data-action="{{ route('admin.doctor.status', $doctor->id) }}" data-question="Are you sure to Inactive this doctor?">
                                <i class="la la-eye-slash"></i> @lang('Inactive')
                            </button>
                            @else
                            <button type="button" class="btn btn-sm btn-outline--success ms-1 confirmationBtn" data-action="{{ route('admin.doctor.status', $doctor->id) }}" data-question="Are you sure to Active this doctor?">
                                <i class="la la-eye"></i> @lang('Active')
                            </button>
                            @endif



                        </div>
                    </th>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{ $doctors->links() }}

<x-confirmation-modal />
@endsection


@push('breadcrumb-plugins')

<a href="{{ route('admin.doctor.form') }}" type="button" class="btn btn-sm btn-outline--primary h-45">
    <i class="las la-plus"></i> + Add New
</a>

@endpush