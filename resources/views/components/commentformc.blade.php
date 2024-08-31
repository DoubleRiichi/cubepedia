<div class="row my-2">
    <div class="col">
        <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#commentForm"  aria-expanded="false" aria-controls="commentForm">Add Comment...</button>
    </div>
</div>

<div class="collapse mb-3" id="commentForm">
    <div class="card card-body">
        <div class="row">
            <div class="col">
                <form action="/wiki/discussion/post" method="post">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <textarea name="post" id="" cols="120" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="text" name="article_id" id="" value="{{$id}}" hidden>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success" type="submit">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
