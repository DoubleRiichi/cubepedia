@extends("layouts.main")
@section("main")

<div class="row">
    <div class="col text-start">    
        <h3>{{$user->username}}'s profile</h3>
    </div>
    @if(Auth::check() && Auth::user()->status == "admin" && $user->status != "admin" )
        <div class="col text-end">
            @if ($user->status == "banned")
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#unbanForm"  aria-expanded="false" aria-controls="unbanForm">Unban</button>
                <div class="collapse" id="unbanForm">
                    <x-adminformc id="{{$user->id}}" route="/admin/unban"/>
                </div>
            @else
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#banForm"  aria-expanded="false" aria-controls="banForm">Ban</button>
                <div class="collapse" id="banForm">
                    <x-adminformc id="{{$user->id}}" route="/admin/ban"/>
                </div>
            @endif
        </div>
    @endif
    <hr>
</div>
<div class="row">
    <div class="col col-md-2  d-flex flex-column ms-0 p-0">
        <img class="img-fluid border" src="{{asset("storage/$user->avatar")}}" alt="{{$user->username}}'s avatar">
        <a class="btn btn-success" href="/user/update/{{$user->username}}">Update</a>
    </div>

    <div class="col">
        <p>joined: {{$user->created_at->format("d/m/Y H:i:s")}}</p>
        @if($user->status == "banned")
            <p>role: <span class="fw-bold" style="color: red;";>this user is {{$user->status}}!</span></p>
        @else
            <p>role: <span>{{$user->status}}</span></p>
        @endif
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