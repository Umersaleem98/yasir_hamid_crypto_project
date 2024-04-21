<!DOCTYPE html>
<html lang="en">
<head>

@include("auth.head");
<title>signup</title>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup" style="margin-top: -9%;">
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

                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="{{ url('register') }}" method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="Phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="phone" name="phone" id="Phone" placeholder="Phone"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password" id="re_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="submit"  name="submit" id="signup" class="btn btn-primary" value="Register"/>
                            </div>
                            <div class="form-group">
                            <a href="{{url('login')}}" class="btn btn-primary" style="background-color:#F8F8F8; color:black ">Login</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="login_auth/images/signup-image.jpg" alt="sing up image"></figure>
                        <!-- <a href="#" class="signup-image-link">I am already member</a>
                        <br> -->
                        <span><h4>Rights</h4></span>
                        <a href="" class="btn btn-primary">Guide</a>
                        <a href="" class="btn btn-primary">Blog</a>
                        <a href="" class="btn btn-primary">Project</a>

                    </div>
                </div>
            </div>
        </section>
    </div>

  @include("auth.js_link");
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
