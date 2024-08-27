@extends("layouts.main")

@section("main")
<div class="p-3">
        <x-articlec :$article :$summary/>


        @if($sections)
            @foreach ($sections as $section)
                <?php $imgs = $images[$section->id]?>
                <x-sectionc :$section :images="$imgs"/>
            @endforeach
        @endif
        @endsection
    
</div>