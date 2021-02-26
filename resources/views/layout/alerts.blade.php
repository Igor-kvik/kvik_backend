<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @elseif(session('warning'))
        <div class="alert alert-danger">
            {{session('warning')}}
        </div>
    @endif
</div>
