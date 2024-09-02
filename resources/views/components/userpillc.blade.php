<div class="row text-center border-dark border text-light bg-success">
            <div class="col">Avatar</div>
            <div class="col">Username</div>
            <div class="col">Status</div>
            <div class="col">Joined</div>
</div>


@foreach ($users as $user)
      <div class="row text-center border-dark border-bottom ">
            <div class="col p-2 "><img src="{{asset("storage/$user->avatar")}}" alt="" width="48" height="48" class="img-fluid rounded-circle border-1 me-2"></div>
            <div class="col p-2 ">{{$user->username}}</div>
            <div class="col  p-2">{{$user->status}}</div>
            <div class="col  p-2">{{$user->created_at}}</div>
      </div>
@endforeach