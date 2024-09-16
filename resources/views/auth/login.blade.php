@extends("layouts.main")

@section("main")

<div class="row">
    <div class="col col-md-4 mx-auto text-center border bg-white p-3">
        <h2>Login!</h2>
        <hr>
        <x-auth.loginc/>
    </div>
</div>

@endsection