@extends("layouts.main")

@section("main")

    <x-searchformc />

    @if ($kind)
        <div class="row mt-4">
            <div class="col">
                @if($kind == "user")
                    <x-userpillc :users="$results"/>
                @elseif ($kind == "moderation_history")
                    <x-modhistorypillc :actions="$results" />
                @elseif ($kind == "comment")
                    <x-commentpillc :comments="$results"/>
                @elseif($kind == "article")
                    <x-articlepillc :articles="$results"/>
                @endif
            </div>
        </div>
    @endif

@endsection


