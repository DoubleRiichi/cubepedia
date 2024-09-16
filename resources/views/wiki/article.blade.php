@extends("layouts.main")

@section("main")
<div class="p-3">
        <x-articlec :$article :$summary :image="$article_image" />

        @if($sections)
            @foreach ($sections as $section)
                <?php $imgs = $images[$section->id]?>
                <x-sectionc :$section :images="$imgs"/>
            @endforeach
        @endif
    
</div>
@endsection
