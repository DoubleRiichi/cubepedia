@extends("layouts.main")
@section("main")

<div class="row">
    <div class="col">
        <h3>{{$user->username}}'s profile</h3>
    </div>


    <hr>

</div>
<div class="row">
    <div class="col col-md-3  ms-0 p-0">
        <img style="max-height: 128px;" class="img-fluid border" src="{{asset("storage/$user->avatar")}}" alt="{{$user->username}}'s avatar">
    </div>

    <div class="col">
        <p>joined: {{$user->created_at->format("d/m/Y H:i:s")}}</p>
        <p>role: {{$user->status}}</p>
        <p>comments: {{count($user_articles)}}</p>
        <p>contributions: {{count($user_comments)}}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <x-articlepillc :articles="$user_articles" />
    </div>
</div>

<div class="row">
    <div class="col">
        <x-commentpillc :comments="$user_comments"/>
    </div>
</div>
@endsection