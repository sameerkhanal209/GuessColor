<x-layout title="Generate Random Colors">
    <section class="section">

        <div class="container">
            <div class="section">
                <div>
                    <h1>All Colors.</h1>
                    <p>A list of all the Hex colors.</p>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="similar-colors shades">

                @for($i = 0; $i < count($allColors); $i++)
                    <a>{{}}</a>
                @endfor

            </div>

        </div>

    </section>
    
</x-layout>