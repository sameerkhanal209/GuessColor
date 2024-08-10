@php
    $title = "#$hex Hex Color";
    $description = "Discover the perfect shade of #$hex with our comprehensive color chart! Our tool provides you with RGB, HSL, and HSV color values, as well as HTML and CSS color codes for #$hex.";
    $keywords = "color like #$hex, hex color #$hex chart, ";
@endphp

<x-layout :hex="$hex" :title="$title" :value="isset($hex) ? $hex : ''" :description="$description" :keywords="$keywords">
    @php
        if ($contrast['white'] > $contrast['black']) {
            $c_color = '#fff';
            $c_good = 'white';
        } else {
            $c_color = '#333';
            $c_good = 'black';
        }
    @endphp

    <div class="modal" id="login-modal">
        <div class="modal-content">
            <div class="card">
                <div class="card-title">
                    You will need to login or Signup to perform this action.
                    <button type="button" class="btn-modal-close modal-close" data-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="card-body">
                    <p>Save colors that you frequently use and easily access them later on without having to manually input the color codes.</p>
                    <p> You can also comment on different colors and share your thoughts and opinions with other users.</p>
                </div>

                <div class="card-footer">
                    <div class="d-flex space-between">
                        <a href="/signup" class="btn btn-fancy box-shadow btn-tiny">
                            Sign up
                        </a>
                        
                        <a href="/login" class="btn btn-primary btn-tiny">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-hero" style="background-color: #{{ $hex }};">
        <div class="container">
            <div class="hero-inner">
                <h1 class="text-shadow" style="color: {{ $c_color }}">#{{ $hex }} Hex Color</h1>
                <p class="text-shadow" style="color: {{ $c_color }}">rgb({{ $rgb[0] }}, {{ $rgb[1] }},
                    {{ $rgb[2] }})</p>

                <div class="hero-btns-holder">

                    @if (auth()->check())

                        @if (!isset($favourite) || $favourite == false)
                            <form action="/fav/{{ $hex }}" method="POST">

                                @csrf

                                <button class="btn btn-sm btn-fancy box-shadow" type="submit">

                                    Favourite

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                        </path>
                                    </svg>

                                </button>

                            </form>
                        @else
                            <form action="/unfav/{{ $hex }}" method="POST">

                                @csrf

                                <button class="btn btn-sm btn-fancy box-shadow" type="submit">

                                    UnFavourite

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>

                                </button>

                            </form>
                        @endif
                    @else
                        <button class="btn btn-sm btn-fancy box-shadow show-login-modal modal-btn"
                            data-modal="login-modal">

                            Favourite

                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                </path>
                            </svg>

                        </button>

                    @endif



                    <!--
                            <button class="btn btn-sm btn-fancy box-shadow btn-orange">

                                Add to Palette
                    
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M9 12l6 0"></path>
                                    <path d="M12 9l0 6"></path>
                                 </svg>
                    
                            </button>
                            -->

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        @include('Parts.alert')
    </div>

    <section class="share-color">
        <div class="container text-center">
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-64036e5b0b58cbdc" defer></script>

            <div class="addthis_inline_share_toolbox"></div>
        </div>
    </section>

    <section>
        <div class="container page-navigation">
            <ul>
                <li><a href="#color-information">Color Information</a></li>
                <li><a href="#color-shades-tints">Color Shades/Tints</a></li>
                <li><a href="#color-previews">Color Previews</a></li>
                <li><a href="#color-schemes">Color Schemes</a></li>
                <li><a href="#color-usage">Color Usage</a></li>
                <li><a href="#color-percentage">Color Percentage</a></li>
                <li><a href="#comments">Comments</a></li>

            </ul>
        </div>
    </section>

    <section class="section" id="color-information">
        <div class="container">
            <div class="heading">
                <h2 class="text-shadow">Color Information</h2>
            </div>

            <div class="table">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>First value</th>
                        <th>Second Value</th>
                        <th>Third Value</th>
                        <th>Fourth Value</th>
                        <th>Written As</th>
                    </tr>
                    <tr>
                        <td><abbr class="info" title="Hexadecimal">HEX</abbr></td>
                        <td>{{ $hex[0] . $hex[1] }}</td>
                        <td>{{ $hex[2] . $hex[3] }}</td>
                        <td>{{ $hex[4] . $hex[5] }}</td>
                        <td>-</td>
                        <td>#{{ $hex }}</td>
                    </tr>
                    <tr>
                        <td><abbr class="info" title="Red Green Blue">RGB</abbr></td>
                        <td>{{ $rgb[0] }}</td>
                        <td>{{ $rgb[1] }}</td>
                        <td>{{ $rgb[2] }}</td>
                        <td>-</td>
                        <td>rgb({{ $rgb[0] }},{{ $rgb[1] }},{{ $rgb[2] }})</td>
                    </tr>
                    <tr>
                        <td><abbr class="info" title="Hue Saturation Lightness">HSL</abbr></td>
                        <td>{{ $hsl[0] }}</td>
                        <td>{{ $hsl[1] }}</td>
                        <td>{{ $hsl[2] }}</td>
                        <td>-</td>
                        <td>hsl({{ $hsl[0] }},{{ $hsl[1] }},{{ $hsl[2] }})</td>
                    </tr>
                    <tr>
                        <td><abbr class="info" title="Hue Saturation Value">HSV</abbr></td>
                        <td>{{ $hsv[0] }}</td>
                        <td>{{ $hsv[1] }}</td>
                        <td>{{ $hsv[2] }}</td>
                        <td>-</td>
                        <td>hsv({{ $hsv[0] }},{{ $hsv[1] }},{{ $hsv[2] }})</td>
                    </tr>
                    <tr>
                        <td>XYZ</td>
                        <td>{{ $xyz['x'] }}</td>
                        <td>{{ $xyz['y'] }}</td>
                        <td>{{ $xyz['z'] }}</td>
                        <td>-</td>
                        <td>xyz({{ $xyz['x'] }},{{ $xyz['y'] }},{{ $xyz['z'] }})</td>
                    </tr>
                    <tr>
                        <td>CIE-LAB</td>
                        <td>{{ $lab['l'] }}</td>
                        <td>{{ $lab['a'] }}</td>
                        <td>{{ $lab['b'] }}</td>
                        <td>-</td>
                        <td>lab({{ $lab['l'] }},{{ $lab['a'] }},{{ $lab['b'] }})</td>
                    </tr>

                    <tr>
                        <td><abbr class="info" title="Cyan Magenta Yellow and Key (Black)">CMYK</abbr></td>
                        <td>{{ $cmyk['cyan'] }}</td>
                        <td>{{ $cmyk['magenta'] }}</td>
                        <td>{{ $cmyk['yellow'] }}</td>
                        <td>{{ $cmyk['key'] }}</td>
                        <td>cmyk({{ $cmyk['cyan'] }},{{ $cmyk['magenta'] }},{{ $cmyk['yellow'] }},{{ $cmyk['key'] }})
                        </td>
                    </tr>


                </table>
            </div>

            <div class="section-item section-flex">

                <div class="description itm">
                    <h3>Description</h3>
                    <p>
                        The RGB value of <strong>color #{{ $hex }}</strong> is rgb({{ $rgb[0] }},
                        {{ $rgb[1] }}, {{ $rgb[2] }}).
                    </p>
                    @php
                        $primary = 'Red';
                        if ($rgb[1] > $rgb[0] && $rgb[1] > $rgb[2]) {
                            $primary = 'Green';
                        } elseif ($rgb[2] > $rgb[0] && $rgb[2] > $rgb[1]) {
                            $primary = 'Blue';
                        } else {
                            $primary = 'Red';
                        }
                    @endphp
                    <p>In the hex color #{{ $hex }}, The value of Red is {{ $rgb[0] }}, value of Green
                        is {{ $rgb[1] }}, and value of Blue is {{ $rgb[2] }}. <strong>The primary color is
                            {{ $primary }}.</strong>
                        Similarly, The HSL values for #{{ $hex }} consists of {{ $hsl[0] }}° Hue,
                        {{ $hsl[1] }} Saturation, and {{ $hsl[2] }} Lightness.
                    </p>
                    <p>
                        In the CMYK color model, the color #{{ $hex }} can be represented as
                        Cyan={{ $cmyk['cyan'] }}%, Magenta={{ $cmyk['magenta'] }}%, Yellow={{ $cmyk['yellow'] }}%,
                        and Black={{ $cmyk['key'] }}%.
                    </p>
                    
                    @if(isset($colorName))
                        <p>This color is named <strong>{{ $colorName['name'] }}</strong>.</p>
                    @endif

                </div>
            </div>

            @if (isset($shades) && count($shades) > 0)
                <div class="section-item" id="color-shades-tints">
                    <h3>Shades of #{{$hex}}</h3>
                    <p>Shades in a color are variations of the color that are created by adding black to it which results in a darker tone.</p>
                    <div class="shades">

                        @foreach ($shades as $shade)
                            <div class="shade">
                                <a href="/color/{{ $shade }}">
                                    <div class="shade-color" style="background-color: #{{ $shade }};"></div>
                                    <span class="name">{{ $shade }}</span>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif


            @if (isset($tints) && count($tints) > 0)
                <div class="section-item" id="color-shades-tints">
                    <h3>Tints of #{{$hex}}</h3>
                    <p>Tints in color are variations of a color that are created by adding white to it, resulting in a lighter tone.</p>

                    <div class="shades">

                        @foreach ($tints as $tint)
                            <div class="shade">
                                <a href="/color/{{ $tint }}">
                                    <div class="shade-color" style="background-color: #{{ $tint }};"></div>
                                    <span class="name">{{ $tint }}</span>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif

            <div class="section-item" id="color-previews">
                <h3>Color Previews of #{{$hex}}</h3>
                <div class="preview-holder">
                    <div class="preview">
                        <h4>Preview of #{{$hex}} on White Background</h4>
                        <div class="preview-box preview-white">
                            <div class="pbox" style="background-color: #{{ $hex }};">

                            </div>
                            <span class="name" style="color: #{{ $hex }};">This is a sample text.</span>
                        </div>
                        <p>The contrast ratio of #{{$hex}} with white color is {{ round($contrast['white'], 2) }}</p>
                        @if ($contrast['white'] > 1 && $c_good == 'white')
                            <p style="margin-top:0;">#{{$hex}} color will look good on a white background.</p>
                        @endif

                    </div>
                    <div class="preview">
                        <h4>Preview of #{{$hex}} on black background</h4>
                        <div class="preview-box preview-black">
                            <div class="pbox" style="background-color: #{{ $hex }};">

                            </div>
                            <span class="name" style="color: #{{ $hex }};">This is a sample text.</span>
                        </div>
                        <p>The contrast ratio of #{{$hex}} with black color is {{ round($contrast['black'], 2) }}</p>

                        @if ($contrast['black'] > 1 && $c_good == 'black')
                            <p style="margin-top:0;">#{{$hex}} color will look good with a black background.</p>
                        @endif

                    </div>

                    <!--
                    <div class="preview">
                        <h4>Preview of #{{$hex}} on complimentary background</h4>
                        <div class="preview-box" style="background-color: #{{ $complimentary[1] }}">
                            <div class="pbox" style="background-color: #{{ $hex }};">

                            </div>
                            <span class="name" style="color: #{{ $hex }};">This is a sample text.</span>
                        </div>
                    </div>
                    -->

                </div>
            </div>

            <div class="section-item" id="color-schemes">
                <h2>Color Schemes of #{{$hex}}</h3>

                    <div class="section-flex colors-grid">

                        @if (isset($triadic) && count($triadic) > 0)
                            <div class="item one">
                                <h3>Triadic Colors of #{{$hex}}</h3>
                                <p>Triadic colors are three colors that are evenly spaced around the color wheel and are therefore harmonious when used together in a design.</p>

                                <div class="shades">

                                    @foreach ($triadic as $tri)
                                        <div class="shade">
                                            <a href="/color/{{ $tri }}">
                                                <div class="shade-color"
                                                    style="background-color: #{{ $tri }};"></div>
                                                <span class="name">#{{ $tri }}</span>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        @endif

                        @if (isset($analogous) && count($analogous) > 0)
                            <div class="item two">
                                <h3>Analogous Colors of #{{$hex}}</h3>
                                <p>Analogous colors are colors that are next to each other on the color wheel and share a similar hue, creating a cohesive and harmonious color scheme.</p>

                                <div class="shades">

                                    @foreach ($analogous as $tri)
                                        <div class="shade">
                                            <a href="/color/{{ $tri }}">
                                                <div class="shade-color"
                                                    style="background-color: #{{ $tri }};"></div>
                                                <span class="name">#{{ $tri }}</span>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        @endif

                        @if (isset($complimentary) && count($complimentary) > 0)
                            <div class="item three">
                                <h3>Complementary Color of #{{$hex}}</h3>
                                <p>Complementary colors are pairs of colors that are directly opposite each other on the color wheel, creating a high contrast and vibrant color scheme when used together.</p>

                                <div class="shades">

                                    @foreach ($complimentary as $comp)
                                        <div class="shade">
                                            <a href="/color/{{ $comp }}">
                                                <div class="shade-color"
                                                    style="background-color: #{{ $comp }};"></div>
                                                <span class="name">#{{ $comp }}</span>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        @endif

                    </div>


            </div>

            <div class="section-item">

                @if (isset($monochromatic) && count($monochromatic) > 0)
                    <div class="item three">
                        <h3>Monochromatic Colors of #{{$hex}}</h3>
                        <p>Monochromatic colors are variations of a single color that are created by using different shades, tints, and tones of that color which results in a harmonious and cohesive color scheme.</p>

                        <div class="shades">

                            @foreach ($monochromatic as $comp)
                                <div class="shade">
                                    <a href="/color/{{ $comp }}">
                                        <div class="shade-color" style="background-color: #{{ $comp }};">
                                        </div>
                                        <span class="name">#{{ $comp }}</span>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                    </div>
                @endif

            </div>

            <div class="section-item">
                <div class="section-flex">

                    <div class="itm one" id="color-usage">

                        <div class="itm-container">
                            <h3>Color Usage</h3>

                            <div>
                                <p class="desc">You can set the css color of a text using:</p>
                                <code>
                                    .class{
                                    color: #{{ $hex }};
                                    }
                                </code>
                                <p class="box"
                                    style="background-color: {{ $c_color }}; color: #{{ $hex }}">This
                                    is a sample text used for the color #{{ $hex }}. Lorem ipsum dolor, sit
                                    amet consectetur adipisicing elit. Animi sunt eveniet natus dolor minima, sit
                                    quaerat? Dignissimos unde alias debitis amet ducimus modi, eum quos ullam blanditiis
                                    aliquam necessitatibus ex.</p>
                            </div>
                        </div>

                        <div class="itm-container">
                            <div>
                                <p class="desc">You can set the css background color of a box using:</p>
                                <code>
                                    .box{
                                    background-color: #{{ $hex }};
                                    }
                                </code>
                                <p class="box"
                                    style="background-color: #{{ $hex }}; color: {{ $c_color }};">
                                    This is a sample text used for the color #{{ $hex }}. Lorem ipsum dolor,
                                    sit amet consectetur adipisicing elit. Animi sunt eveniet natus dolor minima, sit
                                    quaerat? Dignissimos unde alias debitis amet ducimus modi, eum quos ullam blanditiis
                                    aliquam necessitatibus ex.</p>
                            </div>
                        </div>

                        <div class="itm-container">
                            <div>
                                <p class="desc">You can set the css border of a box using:</p>
                                <code>
                                    .box{
                                    border:4px solid #{{ $hex }};
                                    }
                                </code>

                                <div class="box" style="margin-top:10px; background-color: {{ $c_color }}">
                                    <p
                                        style="padding:4px; border: 4px solid #{{ $hex }}; color: #{{ $hex }};">
                                        This is a sample text used for the color #{{ $hex }}. Lorem ipsum
                                        dolor, sit amet consectetur adipisicing elit. Animi sunt eveniet natus dolor
                                        minima, sit quaerat? Dignissimos unde alias debitis amet ducimus modi, eum quos
                                        ullam blanditiis aliquam necessitatibus ex.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="itm two" id="color-percentage">
                        <h3>RGB Percentage</h3>

                        @php
                            $red = $rgb[0];
                            $green = $rgb[1];
                            $blue = $rgb[2];
                            
                            $total = $red + $green + $blue;
                            
                            if ($total != 0) {
                                $red_percent = round(($red / $total) * 100, 2);
                                $green_percent = round(($green / $total) * 100, 2);
                                $blue_percent = round(($blue / $total) * 100, 2);
                            } else {
                                $red_percent = 0;
                                $green_percent = 0;
                                $blue_percent = 0;
                            }
                            
                        @endphp

                        <div class="itm-container">
                            <div class="percent-box">
                                <div class="color red" style="width: {{ $red_percent }}%">
                                </div>
                                <p class="info">
                                    <span>Red</span>
                                    <span>{{ $red_percent }}%</span>
                                </p>
                            </div>

                            <div class="percent-box">
                                <div class="color green" style="width: {{ $green_percent }}%">

                                </div>
                                <p class="info">
                                    <span>Green</span>
                                    <span>{{ $green_percent }}%</span>
                                </p>
                            </div>

                            <div class="percent-box">
                                <div class="color blue" style="width: {{ $blue_percent }}%">


                                </div>
                                <p class="info">
                                    <span>Blue</span>
                                    <span>{{ $blue_percent }}%</span>
                                </p>
                            </div>
                        </div>


                        <div class="itm-container">
                            <h3>CMYK Percentage</h3>

                            @php
                                
                                $cyan = $cmyk['cyan'];
                                $magenta = $cmyk['magenta'];
                                $yellow = $cmyk['yellow'];
                                $black = $cmyk['key'];
                                
                                $total = $cyan + $magenta + $yellow + $black;
                                
                                if ($total != 0) {
                                    $cyan_percent = round(($cyan / $total) * 100, 2);
                                    $magenta_percent = round(($magenta / $total) * 100, 2);
                                    $yellow_percent = round(($yellow / $total) * 100, 2);
                                    $black_percent = round(($black / $total) * 100, 2);
                                } else {
                                    $cyan_percent = 0;
                                    $magenta_percent = 0;
                                    $yellow_percent = 0;
                                    $black_percent = 0;
                                }
                                
                            @endphp

                            <div class="percent-box">
                                <div class="color cyan" style="width: {{ $cyan_percent }}%">

                                </div>
                                <p class="info">
                                    <span>Cyan</span>
                                    <span>{{ $cyan_percent }}</span>
                                </p>
                            </div>

                            <div class="percent-box">
                                <div class="color magenta" style="width: {{ $magenta_percent }}%">


                                </div>
                                <p class="info">
                                    <span>Magenta</span>
                                    <span>{{ $magenta_percent }}%</span>
                                </p>
                            </div>

                            <div class="percent-box">
                                <div class="color yellow" style="width: {{ $yellow_percent }}%">


                                </div>
                                <p class="info">
                                    <span>Yellow</span>
                                    <span>{{ $yellow_percent }}%</span>
                                </p>
                            </div>

                            <div class="percent-box">
                                <div class="color black" style="width: {{ $black_percent }}%">


                                </div>
                                <p class="info">
                                    <span>Black</span>
                                    <span>{{ $black_percent }}%</span>
                                </p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="heading">
                <h2>Random Colors</h2>
            </div>

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

    <!--
                | Will be updated to use user generated colors and AI generated.

            <section class="section">
                <div class="container">
                    <div class="heading">
                        <h2>Color palette consisting this color</h2>
                    </div>

                    <div class="color-palette">
                        
                        <div class="palette">
                            <div class="colors">
                                <a class="color" style="background-color: #ff0000;"></a>
                                <a class="color" style="background-color: #340000;"></a>
                                <a class="color" style="background-color: #990000;"></a>
                                <a class="color" style="background-color: #fff000;"></a>
                                <a class="color" style="background-color: #220000;"></a>
                            </div>
                            <a href="#" class="info">A simple palette.</a>
                        </div>

                    </div>

                </div>
                
            </section>

            -->


    <section class="section" id="comments">
        <div class="container">
            <div class="heading">
                <h2>Comments on this color</h2>
            </div>

            @if (auth()->check())
                <div class="post-comment box-shadow">
                    <form action="/color/{{ $hex }}/comment" method="POST">
                        @csrf

                        <textarea name="comment"></textarea>
                        @error('comment')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group form-recaptcha div-center">
                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>

                            @error('g-recaptcha-response')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-sm box-shadow" type="submit">Post Comment</button>

                    </form>
                </div>
            @else
                <div class="post-comment box-shadow">
                    <p class="text-center">Please login or signup to post a comment.</p>
                </div>
            @endif

            @if ($comments->count() != 0)
                <div class="comments">

                    @include('Parts.Comments.Comment')

                </div>
            @else
                <div class="comments">
                    <p class="text-center">No comments yet.</p>
                </div>
            @endif

        </div>
    </section>


</x-layout>
