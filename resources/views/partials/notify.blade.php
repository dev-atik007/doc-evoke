

@if (session()->has('notify'))
    @foreach (session('notify') as $msg)
        <script>
            "use strict";
            iziToast.{{ $msg[0] }}({message:"{{__($msg[1]) }}", postion: "topRight"});
        </script>
    @endforeach
@endif

@if (isset($errors) && $errors->any())
    @php
        $collection = collect($errors->all())
        $errors = $collection->unique();
    @endphp

    <script>
        "user strict";
        @foreach ($errors as $error)
            iziToast.error({
                message: '{{ __($error)}}',
                position: "topRight"
            })
        @endforeach
    </script>
@endif
<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>