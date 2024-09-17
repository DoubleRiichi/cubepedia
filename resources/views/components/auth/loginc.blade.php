<div class="row">
    <div class="col">
        <form class="form" action="/auth/login" method="post">
            @csrf
            <div class="row mb-4">
                <div class="col">
                <label for="username">Username :</label>
                <input class="form-control"  type="text" name="username" value="{{old("username")}}" id="" required>
                </div>   
            </div>

            <div class="row mb-4">
                <div class="col ">
                <label for="password">Password :</label>
                <input class="form-control"  type="password" id="password" name="password" placeholder="Mot de passe" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button class="btn btn-success" stype="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>