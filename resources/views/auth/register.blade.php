@extends("layouts.main")

@section("main")

<div class="row">
    <div class="col col-md-4 mx-auto text-center border bg-white p-3">
        <h2>Register!</h2>
        <hr>
        @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
    @endif
        <x-auth.registerc/>
    </div>
</div>

@endsection