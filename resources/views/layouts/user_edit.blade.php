<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
            @include('layouts.nav')
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 ml-5">
                            <form action="{{ url('update_users', ['id' => $user->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" value="{{ old('name', $user->name) }}" name="name" id="inputName" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" value="{{ old('email', $user->email) }}" name="email" id="inputEmail" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone">Phone</label>
                                    <input type="tel" class="form-control" value="{{ old('phone', $user->phone) }}" name="phone" id="inputPhone" placeholder="Enter your phone number">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="inputPassword" placeholder="Enter your password">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">Show</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="userType">User Type</label>
                                    <select class="form-control" id="userType" name="user_type">
                                        <option value="admin" {{ old('user_type', $user->user_type) == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="manager" {{ old('user_type', $user->user_type) == 'manager' ? 'selected' : '' }}>Manager</option>
                                        <option value="user" {{ old('user_type', $user->user_type) == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
            </div>


     @include('layouts.footer')

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#togglePassword').click(function(){
            var passwordField = $('#inputPassword');
            var passwordFieldType = passwordField.attr('type');
            if(passwordFieldType == 'password'){
                passwordField.attr('type', 'text');
                $(this).text('Hide');
            } else {
                passwordField.attr('type', 'password');
                $(this).text('Show');
            }
        });
    });
</script>
