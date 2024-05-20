@extends('admin.layouts.abc')
@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @forelse ($contactData as $key=>$data)
                   <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->number }}</td>
                    <td>{{ $data->subject }}</td>
                    <td>{{ $data->message }}</td>
                    <td>
                        <a href="{{route('data.delete',$data->id)}}" class="btn btn-sm btn-outline--danger">Trash</a>
                    </td>
                   </tr>
               @empty
                <td class="text-muted text-center" colspan="100">Data Not Found</td>
               @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4">
       
    </div>
</div>
@endsection