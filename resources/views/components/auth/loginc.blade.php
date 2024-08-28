<div class="row">
    <div class="col">
        <form action="/auth/login" method="post">
            @csrf
            <div class="row mb-4">
                <div class="col">
                <label for="username">Username :</label>
                <input type="text" name="username" value="{{old("username")}}" id="" required>
                </div>   
            </div>

            <div class="row mb-4">
                <div class="col ">
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>