<div class="row text-center border-dark border text-light bg-success">
            <div class="col">User</div>
            <div class="col">Comment</div>
            <div class="col">Article</div>
            <div class="col">Date</div>
</div>

@if(count($comments) > 0)

      @foreach ($comments as $item)

            <div class="row text-center border-dark border-bottom ">
                  <div class="col p-2">
                  <div class="row">
                  <div class="col text-end "><img src="{{asset("storage/$item->avatar")}}" alt="" width="48" height="48" class="img-fluid rounded-circle border-1 me-2"></div>
                  <div class="col text-start "><a href="/profile/{{$item->username}}">{{$item->username}}</a></div>
                  </div>
                  </div>
                  <div class="col  p-2"><button data-bs-toggle="collapse" data-bs-target="#comment-{{$item->id}}" aria-expanded="false" aria-controls="comment-{{$item->id}}">Show</button></div>
                  <div class="col  p-2"><a href="/wiki/{{$item->title}}">{{$item->title}}</a></div>
                  <div class="col  p-2"><a href="/wiki/{{$item->article_id}}/discussion#p-comment-{{$item->id}}">{{$item->created_at->format("d/m/Y H:m:s")}}</a></div>
            </div>

            <div class="row">
                  <div class="col">
                  <div class="collapse" id="comment-{{$item->id}}">
                        <div class="card card-body">
                        <p>
                              {!! nl2br($item->post)!!}  
                        </p>
                  </div>
                  </div>
                  </div>
            </div>
      @endforeach
@else
      <div class="row text-center border-dark border-bottom text-center">
                  <div class="col">
                        <p class="fw-bold">No comments found!</p>
                  </div>
      </div>
@endif