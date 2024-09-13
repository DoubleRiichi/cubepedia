<div class="row text-center border-dark border text-light bg-success">
            <div class="col col-md-2">Action</div>
            <div class="col col-md-2">Date</div>
            <div class="col">Comment</div>
</div>

@if($actions->count())
    @foreach ($actions as $action)
        <div class="row text-center border-dark border-bottom ">
                <div class="col col-md-2 p-2 ">{{$action->action}}</div>
                <div class="col col-md-2 p-2">{{$action->created_at}}</div>
                <div class="col  p-2"><button data-bs-toggle="collapse" data-bs-target="#article-{{$action->id}}" aria-expanded="false" aria-controls="article-{{$action->id}}">show</button></div>
        </div>

        <div class="row">
                  <div class="col">
                        <div class="collapse" id="article-{{$action->id}}">
                              <div class="card card-body">
                                    {!!nl2br($action->comment)!!}
                              </div>
                        </div>
                  </div>
            </div>
    @endforeach
@else
      <div class="row text-center border-dark border-bottom text-center">
            <div class="col"> 
                  <p class="fw-bold">No actions taken!</p>
            </div>
      </div>
@endif