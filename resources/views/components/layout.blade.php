<x-meta :hex="isset($hex) ? $hex : null" :title="$title" :description="isset($description) ? $description : null" :keywords="isset($keywords) ? $keywords : null">

    @include('Parts.Header')

    {{$slot}}

    @include('Parts.Footer')
    
</x-meta>