<x-layout title="{{$username}}'s Profile">
    <div class="container content-area">
        <div class="section">
            <div>
                <h1>{{$username}}'s Profile</h1>

                <h2>Favourite Colors</h2>
                
                <div class="similar-colors shades">
                    
                    @if(count($favourites) == 0)
                        <p>{{$username}} has no favourite colors yet.</p>
                    @else

                        @foreach($favourites as $color)
                        <div class="shade">
                            <a href="/color/{{$color['colorhex']}}">
                                <div class="shade-color" style="background-color: #{{$color['colorhex']}};"></div>
                                <span class="name">#{{$color['colorhex']}}</span>
                            </a>
                        </div>
                        @endforeach

                    @endif

                </div>

                <h2>Recent Comments</h2>

                <div class="comments">

                    @if(count($comments) == 0)
                        <p class="text-center">{{$username}} has no comments yet.</p>
                    @else
                        @include('Parts.Comments.Comment', ['showComment' => true])
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-layout>