<div class="row pt-4">
    <div class="col" id="{{$section->title}}">
        <h3>{{$section->title}}</h3>
        <hr />
        <p>{!!$section->content!!}</p>
    </div>
    @if ($images && count($images) == 1)
        <div class="text-end  col-md-4 col-lg-3 col-xl-3">
            <div class="border p-2 bg-light">
                <img class=" object-fit-contain img-fluid" src="{{$images[0]->path}}" alt="{{$images[0]->description}}">
                <p class="fs-6 pt-2 fst-italic text-start">{{$images[0]->description}}</p>
            </div>
        </div>
    @endif
</div>

@if ($images && count($images) > 1)

<div class="row border bg-light justify-content-center">
        
        @foreach ($images as $img)
        <div class="col-md-4 col-lg-3 col-xl-3 text-center text-bottom">
            
            <img class="img-thumbnail object-fit-contain img-fluid" src="{{$img->path}}" alt="{{$img->description}}">
            <p class="fs-6 fst-italic">{{$img->description}}</p>
        </div>

        @endforeach
</div>
@endif
