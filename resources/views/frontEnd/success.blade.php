
    @if (Session::has('success'))
    <div class="alert-bg">
        <div class="alert bg-green">
            {{Session::get('success')}}
        </div>
    </div>
    @endif
