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
<div class="row my-2">
    <div class="col">
        <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#commentForm"  aria-expanded="false" aria-controls="commentForm">Add Comment...</button>
    </div>
</div>

<div class="collapse mb-3" id="commentForm">
    <div class="card card-body">
        <x-commentformc :$id route="/wiki/discussion/post"/>
    </div>
</div>
@endif

<x-commentc :$comments/>

@endsection
