<!DOCTYPE html>
<html lang="en">
<head>

@include("auth.head");
<title>Sign in</title>

</head>
<body>

    <div class="main">

        <!-- Sign up form -->

        <!-- Sing in  Form -->
        <section class="sign-in" style="margin-top: -7%;">
            <div class="container">
            @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="login_auth/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{url('/register')}}" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ url('login') }}" class="register-form" id="login-form">
    @csrf
    <div class="form-group">
        <label for="employee_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
        <input type="email" name="email" id="employee_email" placeholder="Email" value="{{ old('employee_email') }}" required />
        @error('employee_email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="employee_password"><i class="zmdi zmdi-lock"></i></label>
        <input type="password" name="password" id="employee_password" placeholder="Password" required />
        @error('employee_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
        <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
    </div>
    <div class="form-group form-button">
        <button type="submit" class="btn btn-primary">Log in</button>
    </div>
</form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    @include("auth.js_link");
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
