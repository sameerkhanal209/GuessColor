<x-meta :title="$title">

    @include('Parts.Header')

    {{$slot}}

    @include('Parts.Footer')
    
</x-meta>