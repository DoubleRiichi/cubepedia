<div class="row text-center border-dark border text-light bg-success">
            <div class="col">User</div>
            <div class="col">Comment</div>
            <div class="col">Article</div>
            <div class="col">Date</div>
</div>


@foreach ($comments as $item)

      <div class="row text-center border-dark border-bottom ">
            <div class="col p-2">
                <div class="row">
                <div class="col text-center "><img src="{{asset("storage/$item->avatar")}}" alt="" width="48" height="48" class="img-fluid rounded-circle border-1 me-2"></div>
                <div class="col text-center ">{{$item->username}}</div>
                </div>
            </div>
            <div class="col  p-2"><button data-bs-toggle="collapse" data-bs-target="#comment-{{$item->id}}" aria-expanded="false" aria-controls="comment-{{$item->id}}">Show</button></div>
            <div class="col  p-2"><a href="wiki/{{$item->title}}">{{$item->title}}</a></div>
            <div class="col  p-2">{{$item->created_at}}</div>
      </div>

      <div class="row">
            <div class="col">
            <div class="collapse" id="comment-{{$item->id}}">
                  <div class="card card-body">
                  {!!$item->post!!}
            </div>
            </div>
            </div>
      </div>
@endforeach