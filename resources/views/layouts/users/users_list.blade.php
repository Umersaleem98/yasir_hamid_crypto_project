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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h3 class="text-primary ml-5">User List</h3>
                    <div class="row">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        <div class="col-md-10 mt-5 ml-5">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->user_type}}</td>
                                    <td>
                                        <a href="{{ url('delete_users', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('edit_users', ['id' => $user->id]) }}" class="btn btn-info">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
         </div>


     @include('layouts.footer')

</body>

</html>
