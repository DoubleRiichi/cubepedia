<div class="row">
    <div class="col">
        <h1 class="fst-italics">{{$article->title}}</h1>
        <hr />
    </div>
    <div class="col text-end">
        <a class="tab" href="/wiki/{{$article->id}}/discussion">Discussion</a>
    </div>
</div>

<div class="row">
    <div class="col">
        {!! nl2br($article->intro) !!}
    </div>
@if($image)
    <div class="text-end col-md-4 col-lg-3 col-xl-2 text-center px-0">
        <div class="border p-2 bg-light">

            <img class=" object-fit-contain img-fluid" src="{{$image->path}}" alt="{{$image->description}}">
            <p class="fs-6 pt-2 fst-italic ">{{$image->description}}</p>

        </div>
    </div>
@endif
</div>

@if($summary)
<div class="row pt-2">
    <div class="col">
        <div id="summary">
            <ol class="border p-4 bg-light adaptative">
                @foreach ($summary as $item)
                    <a href="#{{$item}}"><li>{{$item}}</li></a>
                @endforeach
            </ol>
        </div>
    </div>
</div>
@endif

