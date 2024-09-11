

<div class="row text-center border-dark border text-light bg-success p-2">
      <div class="col">Title</div>
      <div class="col">Author</div>
      <div class="col">Creation</div>
      <div class="col">Edit</div>
      <div class="col">Description</div>
</div>
@if($articles->count())
      @foreach ($articles as $item)
            <div class="row text-center border-dark border-bottom ">
                  <div class="col  p-2"><a href="/wiki/{{$item->title}}">{{$item->title}}</a></div>
                  <div class="col  p-2">{{$item->username}}</div>
                  <div class="col  p-2">{{$item->created_at}}</div>
                  <div class="col  p-2">{{$item->updated_at}}</div>
                  <div class="col  p-2"><button data-bs-toggle="collapse" data-bs-target="#article-{{$item->id}}" aria-expanded="false" aria-controls="article-{{$item->id}}">show</button></div>
            </div>

            <div class="row">
                  <div class="col">
                  <div class="collapse" id="article-{{$item->id}}">
                        <div class="card card-body">
                        {!! nl2br($item->intro)!!}
                  </div>
                  </div>
                  </div>
            </div>
      @endforeach
@else
      <div class="row text-center border-dark border-bottom text-center">
            <div class="col">
                  <p class="fw-bold">No Articles found!</p>
            </div>
      </div>
@endif