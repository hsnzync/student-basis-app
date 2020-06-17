@if ($errors->any())
    <div class="alert alert-danger errors">
        @foreach ($errors->all() as $error)
            <p class="my-2">{{ $error }}</p>
        @endforeach
    </div>
@endif
