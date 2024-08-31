@extends("layouts.main")

@section("main")
<div class="row p-3">
    <div class="col">
        <h3>{{$title}} Discussion</h3>
    </div>
    <div class="col text-end">
        <a href="/wiki/{{$title}}">Back</a>
    </div>
</div>
<hr>

@if(Auth::check())
    <x-commentformc :$id />
@endif

<x-commentc :$comments/>

@endsection
