<x-layout title="Generate Random Colors">
    <section class="section">

        <div class="container">
            <div class="section">
                <div>
                    <h1>Popular Colors of our site.</h1>
                    <p>A list of all the popular colors on our site.</p>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="similar-colors shades">
                @if(count($popularColors) == 0)
                    <p class="text-center">There are no popular colors yet.</p>
                @endif

                @foreach ($popularColors as $color)
                    <div class="shade">
                        <a href="/color/{{ $color['colorhex'] }}">
                            <div class="shade-color" style="background-color: #{{ $color['colorhex'] }};"></div>
                            <span class="name">#{{ $color['colorhex'] }}</span>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

    </section>
    
</x-layout>