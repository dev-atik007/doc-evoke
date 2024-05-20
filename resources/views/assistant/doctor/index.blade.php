@extends('assistant.layouts.abc')
@section('panel')

<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th><strong>S.N.</strong></th>
                    <th><strong>Doctor</strong></th>
                    <th><strong>Schedule Type</strong></th>
                    <th><strong>Serial / Slot Info</strong></th>
                    <th><strong>Department</strong></th>
                    <th><strong>Location</strong></th>
                    <th><strong>Appointment</strong></th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($doctors as $key=>$doctor)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>
                            @if ($doctor->slot_type == 1)
                                Serial
                            @else
                                Time Slot
                            @endif
                        </td>
                        <td>{{ $doctor->max_serial }}</td>
                        <td>{{ $doctor->department->name }}</td>
                        <td>{{ $doctor->location->name }}</td>
                        <td>
                        <div class="button--group">
                            <a href="{{ route('assistant.doctor.appointment.new', $doctor->id) }}"
                                class="btn btn-sm btn-outline--warning"> <i class="las la-handshake"></i>
                                New List
                            </a>
                            <a href="{{ route('assistant.doctor.appointment.completed', $doctor->id) }}"
                                class="btn btn-sm btn-outline--primary"> <i class="las la-check-circle"></i>
                                Done List
                            </a>
                            <a href=""
                                class="btn btn-sm btn-outline--danger"> <i class="las la-trash"></i>
                                Trash List
                            </a>
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

