<div class="row">
    <div class="col">
        <h1 class="fst-italics">{{$article->title}}</h1>
    </div>

    <div class="col text-end">
        <a class="tab" href="/wiki/{{$article->id}}/discussion">Discussion</a>
    </div>
    
    <hr />
</div>

@if(Auth::check() && Auth::user()->status == "admin")
    <div class="row">
            <div class="col text-end">
                @if ($article->locked)
                    <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#lockForm"  aria-expanded="false" aria-controls="lockForm">unlock</button>
                    <div class="collapse" id="lockForm">
                        <x-adminformc id="{{$article->id}}" route="/admin/lock"/>
                    </div>
                @else
                    <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#unlockForm"  aria-expanded="false" aria-controls="unlockForm">lock</button>
                    <div class="collapse" id="unlockForm">
                        <x-adminformc id="{{$article->id}}" route="/admin/unlock"/>
                    </div>
                @endif
            </div>
    </div>
@endif

<div class="row">
    <div class="col border border-1 p-2" style="background-color: white;">
        {!! nl2br($article->intro) !!}
    </div>
    @if($image)
        <div class="text-end col-md-4 col-lg-3 col-xl-2 text-center px-0">
            <div class="border p-2 bg-light">
                <img class="object-fit-contain img-fluid" src="{{$image->path}}" alt="{{$image->description}}">
                <p class="fs-6 pt-2 fst-italic ">{{$image->description}}</p>
            </div>
        </div>
    @endif
</div>

@if($summary)
    <div class="row pt-2">
        <div class="col" >
            <div id="summary">
                <ol class="border p-4 adaptative" style="background-color: lightgrey;">
                    @foreach ($summary as $item)
                        <a href="#{{$item}}"><li>{{$item}}</li></a>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endif

