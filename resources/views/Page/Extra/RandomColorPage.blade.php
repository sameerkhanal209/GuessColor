<x-layout title="Generate Random Colors">
    <section class="section">

        <div class="container">
            <div class="section">
                <div>
                    <h1>Random Color Generater</h1>
                    <p>Generate a list of random colors. You can refresh the page to generate another list.</p>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="similar-colors shades">

                @foreach ($randomColors as $color)
                    <div class="shade">
                        <a href="/color/{{ $color }}">
                            <div class="shade-color" style="background-color: #{{ $color }};"></div>
                            <span class="name">#{{ $color }}</span>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

    </section>
    
</x-layout>