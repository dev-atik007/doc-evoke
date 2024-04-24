
@php
    $departmentContent = getContent('department.content',true);
    $departmentData    = \App\Models\Department::orderBy('id', 'DESC')->get();

    if($departmentData->count() >= 4){
        $length = round($departmentData->count() / 4);
    }else{
        $length = $departmentData->count();
    }
    $item = [];
    $skip = 0;
    for($i = 0; $i<$length; $i++) {
        $item[$i] = $departmentData->skip($skip)->take(4);
        $skip += 4;
    }
@endphp


   