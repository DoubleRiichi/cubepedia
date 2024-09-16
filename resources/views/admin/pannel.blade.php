@extends("layouts.main")

@section("main")

<div class="">
        <div class="row my-3 mt-5">
            <div class="col">
                <h2>Users</h2>
            </div>
            <div class="col text-end">
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#usersCollapse"  aria-expanded="false" aria-controls="usersCollapse">Show</button>
            </div>
            <hr>
        </div>

        <div class="collapse mb-3" id="usersCollapse">
            <div class="card card-body">
                <div class="row">
                    <div class="col">
                        <x-userpillc :users="$users" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3 mt-5">
            <div class="col">
                <h2>Moderation log</h2>
            </div>
            <div class="col text-end">
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#logCollapse"  aria-expanded="false" aria-controls="logCollapse">Show</button>
            </div>
            <hr>

        </div>
        <div class="collapse mb-3" id="logCollapse">
            <div class="card card-body">
                <div class="row">
                    <div class="col">
                        <x-modhistorypillc :actions="$moderation_history" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3 mt-5">
            <div class="col">
                <h2>Articles</h2>
            </div>
            <div class="col text-end">
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#articleCollapse"  aria-expanded="false" aria-controls="articleCollapse">Show</button>
            </div>
            <hr>
        </div>
        <div class="collapse mb-3" id="articleCollapse">
            <div class="card card-body">
                <div class="row">
                    <div class="col">
                        <x-articlepillc :articles="$articles" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3 mt-5">
            <div class="col">
                <h2>Comments</h2>
            </div>
            <div class="col text-end">
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#commentsCollapse"  aria-expanded="false" aria-controls="commentsCollapse">Show</button>
            </div>
            <hr>
        </div>
        <div class="collapse mb-3" id="commentsCollapse">
            <div class="card card-body">
                <div class="row">
                    <div class="col">
                        <x-commentpillc :comments="$comments" />
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection