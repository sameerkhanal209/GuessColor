<x-auth title="Activate to your account">

    <div class="auth-divider">

        <div class="login-section">
            <div class="auth-container">
                <div class="auth-inner">
                    <h1>Activate your account.</h1>
                    <p class="desc">Welcome. You will need to activate your new account. Please check your email address for a verification email.</p>
                    <p>If you did not recieve the email within 2-3 minutes, you can click on the button below to resend the email.</p>

                    <div class="auth-holder">

                        @include('Parts.alert')

                        @if($resend)
                        <form action="/resend-email" method="POST">
                            @csrf
                            <div class="input-holder">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                
                                @error('g-recaptcha-response')
                                    <span class="cool text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-holder">
                                <button type="submit" class="box-shadow btn-primary">Re-Send Email</button>
                            </div>
                        </form>
                        @else
                        
                        @endif

                        <form action="/logout" method="POST">

                            @csrf

                            <div class="input-holder">
                                <button class="btn btn-primary" type="submit">Log Out</button>
                            </div>

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
