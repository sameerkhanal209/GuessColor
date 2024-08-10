<x-auth title="Login to your account">

    <div class="auth-divider">

        <div class="login-section">
            <div class="auth-container">
                <div class="auth-inner">
                    <h1>Login to your account</h1>
                    <p class="desc">Welcome. Please enter your login details.</p>

                    <div class="auth-holder">

                        @include('Parts.alert')

                        <form action="/login" method="POST">

                            @csrf

                            <div class="input-holder">
                                <label for="email">Email Address</label>
                                <input class="input" type="email" name="email" value="{{ @old('email') }}">

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-holder">
                                <label for="password">Password</label>
                                <input class="input" type="password" name="password">

                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <!-- <p class="forgot-password"><a href="/forgot-password">Forgot Password?</a></p> -->
                            </div>

                            <div class="input-holder">
                                <button class="btn btn-primary" type="submit">Log In</button>
                            </div>

                            <p class="link-auth"><a href="/signup">Don't have an account?</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="information-section">
            <div class="background"></div>
        </div>
    </div>

</x-auth>
