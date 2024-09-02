<div class="row text-center border-dark border text-light bg-success">
            <div class="col">Action</div>
            <div class="col">Date</div>
            <div class="col">Affected User</div>
            <div class="col">Affected Article</div>
</div>


@foreach ($actions as $action)
      <div class="row text-center border-dark border-bottom ">
            <div class="col p-2 ">{{$action->action}}</div>
            <div class="col p-2">{{$action->created_at}}</div>
            <div class="col p-2">{{$action->username}}</div>
            <div class="col p-2"><a href="/wiki/{{$action->title}}">{{$action->title}}</a></div>
      </div>
@endforeach
