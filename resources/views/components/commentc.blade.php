<div class="row ">
    <div class="col">
        @foreach ($comments as $comment)

                @if (Auth::id() == $comment->user_id)
                <div class="row border border-1 bg-white">
                    <div class="col text-end my-0">
                        <a href="/wiki/discussion/edit/{{$comment->id}}">edit</a>
                        <a href="/wiki/discussion/delete/{{$comment->id}}">delete</a>
                    </div>
                </div>
                @endif
        <div class="row mb-4 border border-1 bg-white">
            <div class="col-1 d-flex flex-column  mx-start py-3">
                <div class="col text-center">
                    <p>{{$comment->username}}</p>
                    <img  class="img-fluid" src="{{asset("storage/$comment->avatar")}}" alt="{{$comment->username}}'s avatar">
                </div>

            </div>

            <div class="col-8 col-md-11 d-flex flex-column border">
                    <div class="col text-end fw-light mt-0">
                        {{$comment->created_at}} {{$comment->updated_at}}
                    </div>

                <div class="col">
                    <p>
                    {!!$comment->post!!}
                    </p>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
