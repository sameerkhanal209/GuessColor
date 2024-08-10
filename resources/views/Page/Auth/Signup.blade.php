<x-auth title="Login to your account">

    <div class="auth-divider">

        <div class="login-section">
            <div class="auth-container">
                <div class="auth-inner">
                    <h1>Create a new account</h1>
                    <p class="desc">Please fill the signup form below. All the details are mandatory.</p>

                    <div class="auth-holder">

                        @include('Parts.alert')

                        <form action="/signup" method="POST">

                            @csrf

                            <div class="input-holder">
                                <label for="email">Email Address</label>
                                <input class="input" type="email" name="email" value="{{old('email')}}">

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-holder">
                                <label for="username">Username</label>
                                <input class="input" type="text" name="username" value="{{old('username')}}">

                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-holder">
                                <label for="password">Password</label>
                                <input class="input" type="password" name="password">

                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-holder">
                                <label for="password">Confirm Password</label>
                                <input class="input" type="password" name="password_confirmation">

                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-holder">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
            
                                @error('g-recaptcha-response')
                                    <span class="cool text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-holder">
                                <button class="btn btn-primary" type="submit">Sign up</button>
                            </div>

                            <p class="link-auth"><a href="/login">Already have an account?</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="information-section">
            <div class="sample"></div>
        </div>
    </div>

</x-auth>
