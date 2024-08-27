<div class="row">
    <div class="col">
        <h1 class="fst-italics">{{$article->title}}</h1>
        <hr />
    </div>
</div>


<div class="row">
    <div class="col">
        <p>{{$article->intro}}</p>
    </div>
</div>

@if($summary)
<div class="row">
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

