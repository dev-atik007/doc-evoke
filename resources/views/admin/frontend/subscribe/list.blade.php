@extends('admin.layouts.abc')

@section('panel')
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Email</th> 
                </tr>
            </thead>
            <tbody class="">
                @forelse ($subscribes as $key=>$subscribe)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $subscribe->email }}</td>
                    </tr>
                @empty
                    <h1>Data Not found</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>  
@endsection