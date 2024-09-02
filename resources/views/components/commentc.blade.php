<div class="row ">
    <div class="col">
        @foreach ($comments as $comment)

                @if (Auth::id() == $comment->user_id || Auth::user()->status == "admin")
                <div class="row border border-1 bg-white">
                    <div class="col text-start fw-lighter mt-0">
                        {{$comment->created_at}} {{$comment->updated_at}}
                    </div>
                    <div class="col text-end my-0">
                        <a data-bs-toggle="collapse" href="#commentForm-{{$comment->id}}" role="button" aria-expanded="false" aria-controls="commentForm-{{$comment->id}}">edit</a>
                        <a href="/wiki/discussion/delete/{{$comment->id}}">delete</a>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col">
                        <div class="collapse mb-3" id="commentForm-{{$comment->id}}">
                            <div class="card card-body">
                                <x-commentformc id="{{$comment->id}}" route="/wiki/discussion/update"/>
                            </div>
                        </div>
                    </div>  
                </div>


                @endif
        <div class="row mb-4 border border-1 bg-white">
            <div class="col-3 col-md-1 d-flex flex-md-column  mx-start py-3">
                <div class="col text-center">
                    <p>{{$comment->username}}</p>
                    <img  class="img-fluid" src="{{asset("storage/$comment->avatar")}}" alt="{{$comment->username}}'s avatar">
                </div>

            </div>

            <div class="col col-md-11 d-flex flex-column border" id="p-comment-{{$comment->id}}">
                <div class="col">
                    <p>
                    {!! nl2br($comment->post)!!}
                    </p>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
