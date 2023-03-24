
@if (Session::has('error'))
    <div class="alert-bg">
        <div class="alert bg-red">
            {{Session::get('error')}}
        </div>
    </div>
@endif
