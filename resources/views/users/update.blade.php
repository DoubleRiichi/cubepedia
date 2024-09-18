@extends("layouts.main")
@section("main")

@if($errors->any())
        <?php $all = $errors->all();?>
    <x-errorbox :errors="$all" />
@endif

<div class="row">
    <div class="col">    
        <x-userupdateformc :$user />
    </div>
</div>
@endsection