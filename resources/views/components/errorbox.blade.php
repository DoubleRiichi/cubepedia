<div class="row">
    <div class="col  bg-light border border-danger">
        <ul>
        @foreach ($errors as $error)
            <li class="text-danger">{{$error}}</li>
        @endforeach
        </ul>
    </div>
</div>