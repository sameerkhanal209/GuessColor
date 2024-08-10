<header>
    <div class="container">
        <div class="header-wrapper box-shadow">
            <div class="logo">
                <h3><a href="/">Guess Color</a></h3>
            </div>

            <div class="search">
                <form action="/search" method="GET">
                    <input type="text" name="color" id="color-hex" value="{{isset($value) ? "#" . $value : ""}}">
                    <span class="pikr"></span>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="23" height="23" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                    </button>
                </form>
            </div>


            <div class="menu">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/game">Color Game</a></li>
                    <li><a href="/random-color">Random Color</a></li>
                </ul>
            </div>

            <div class="profile">

                @if(auth()->check())
                @php
                    $email_hash = md5( strtolower( trim( auth()->user()->email ) ) )
                @endphp
                <div class="profile-image">
                    <img height="35" width="35" class="image" src="https://www.gravatar.com/avatar/{{$email_hash}}?r=pg&amp;d=retro" alt="Profile Image">
                </div>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="35" height="35" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                 </svg>
                @endif

                 <div class="profile-holder box-shadow">
                        
                        @if(auth()->check())
                        <ul>
                            <li><a href="/profile/{{auth()->user()->username}}">Profile</a></li>
                            <li>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                        @else
                        <ul>
                            <li><a href="/login">Login</a></li>
                            <li><a href="/signup">Signup</a></li>
                        </ul>
                        @endif
                 </div>
            </div>

            <div class="ham">
                <button class="menu-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 6l16 0"></path>
                    <path d="M4 12l16 0"></path>
                    <path d="M4 18l16 0"></path>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</header>