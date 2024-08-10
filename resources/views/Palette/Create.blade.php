<x-layout title="Quick and easy color palette creation tool">
    <section class="section page palette-page">

        <div class="container">
            <div class="section">
                <div>
                    <h1>Create a new color palette.</h1>
                    <p>Add colors to a color palette and save.</p>
                </div>
            </div>
        </div>

        <div class="color-section">

            <div class="container">

                <div class="palette-form form">
                        <div class="input-holder">
                            <label for="name">Palette Name</label>
                            <input type="text" name="name" id="name" placeholder="Palette Name">
                        </div>

                        <div class="input-holder colors-input">
                            <label>Choose Colors for the palette</label>
                            <div class="color-add">
                                <div class="c-1"></div>
                                <input type="text" name="color1" id="color1" value="#111111">
                            </div>
                            <div class="color-add">
                                <div class="c-2"></div>
                                <input type="text" name="color2" id="color2" value="#222222">
                            </div>
                            <div class="color-add">
                                <div class="c-3"></div>
                                <input type="text" name="color3" id="color3" value="#333333">
                            </div>
                            <div class="color-add">
                                <div class="c-4"></div>
                                <input type="text" name="color4" id="color4" value="#444444">
                            </div>
                            <div class="color-add">
                                <div class="c-5"></div>
                                <input type="text" name="color5" id="color5" value="#555555">
                            </div>
                        </div>

                        <div class="input-holder">
                            <button class="btn btn-primary btn-tiny">Save Palette</button>
                        </div>
                </div>

                <div class="palette-big">
                    <div class="color color-big-1" style="background-color: #111;">
                        
                    </div>
                    <div class="color color-big-2" style="background-color: #222;">
                    </div>
                    <div class="color color-big-3" style="background-color: #333;">
                    </div>
                    <div class="color color-big-4" style="background-color: #444;">
                    </div>
                    <div class="color color-big-5" style="background-color: #555;">
                    </div>
                </div>
            </div>

        </div>

        

    </section>
</x-layout>

