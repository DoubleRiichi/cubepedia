<div class="row ">
    <div class="col">
        @foreach ($comments as $comment)
        <div class="row mb-4 border border-1 bg-white">
            <div class="col d-flex flex-column  mx-start py-3">
                <div class="col text-center">
                    <p>{{$comment->username}}</p>
                </div>
                <div class="col">
                    <img  class="img-fluid" src="{{asset("storage/$comment->avatar")}}" alt="{{$comment->username}}'s avatar">
                </div>
   
            </div>

            <div class="col-8 col-md-11 d-flex flex-column border">
                <div class="col-1">
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