<div class="row">
    <div class="col">
        <form action="/auth/register" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col">
                <label for="username">Username :</label>
                <input class="form-control" type="text" name="username" placeholder="username" id="" required>
                </div>   
            </div>
            <div class="row mb-4">
                <div class="col">
                <label for="email">Email :</label>
                <input class="form-control" type="email" name="email" placeholder="email" id="" required>
                </div>   
            </div>
            <div class="row mb-4">
                <div class="col">
                <label for="password">Password :</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="password" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col ">
                <label for="avatar">Avatar :</label>
                <input class="fs-6" type="file" name="avatar" id="">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button class="btn btn-success" type="submit">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>