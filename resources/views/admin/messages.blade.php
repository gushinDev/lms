@if ($errors->any())
    <div class="alert alert-danger mt-3">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@elseif(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
