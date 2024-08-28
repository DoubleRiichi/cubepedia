<div class="row">
    <div class="col">
        <form action="/wiki/discussion/post" method="post">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <textarea name="post" id="" cols="30" rows="10"></textarea>
                </div>   
            </div>
            <input type="text" name="article_id" id="" value="{{$id}}">

            <div class="row">
                <div class="col">
                    <button type="submit">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>