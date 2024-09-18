<div class="row">
    <div class="col">
        <form class="form" action="/user/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col">
                <label for="username">Username :</label>
                <input class="form-control" type="text" name="username" value="{{$user->username}}" id="" required>
                </div>   
            </div>

            <div class="row mb-4">
                <div class="col ">
                <label for="avatar">Avatar :</label>
                <input class="form-control" class="fs-6" type="file" name="avatar" id="">
                </div>
            </div>

            <input hidden type="text" name="user_id" value="{{$user->id}}" id="">

            <div class="row">
                <div class="col">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>