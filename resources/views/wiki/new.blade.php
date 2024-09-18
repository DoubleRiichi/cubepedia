@extends("layouts.main")

@section("main")
<div class="p-3">
    @if($errors->any())
        <?php $all = $errors->all();?>
    <x-errorbox :errors="$all" />
        @endif
    <x-articleformc />
</div>
@endsection
