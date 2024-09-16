@extends("layouts.main")

@section("main")

<div class="row">
    <div class="col">
        <h2>Recent Articles</h2>
        <hr>
        <x-articlepillc :articles="$recent_articles" />
    </div>
</div>

<div class="row mt-5">
    <div class="col">
        <h2>Recent Comments</h2>
        <hr>
        <x-commentpillc :comments="$recent_comments" />
    </div>
</div>
@endsection