@extends("layouts.main")

@section("main")
<div class="row">
    <div class="col">
        <h3>{{$title}} Discussion</h3>
        <hr>
    </div>
</div>

<x-commentc :$comments/>

@endsection
