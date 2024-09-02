@extends("layouts.main")

@section("main")

<div class="">
        <div class="row my-3 mt-5">
            <div class="col">
                <h2>Users</h2>
                <hr>
                <x-userpillc :users="$users" />
            </div>
        </div>

        <div class="row my-3 mt-5">
            <div class="col">
                <h2>Moderation log</h2>
                <hr>
                <x-modhistorypillc :actions="$moderation_history" />
            </div>
        </div>

        <div class="row my-3 mt-5">
            <div class="col">
                <h2>Articles</h2>
                <hr>
                <x-articlepillc :articles="$articles" />
            </div>
        </div>

        <div class="row my-3 mt-5">
            <div class="col">
                <h2>Comments</h2>
                <hr>
                <x-commentpillc :comments="$comments" />
            </div>
        </div>
</div>

@endsection