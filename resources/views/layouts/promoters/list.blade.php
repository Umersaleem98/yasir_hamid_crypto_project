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

                        <div class="col-md-10">
                            <h3 class="text-primary ml-5"> promoters List</h3>
                            <table class="table table-bordered ml-5 mt-3">
                                <tr>
                                    <th>Id</th>
                                    <th>promoters Name</th>
                                    <th>Website Url</th>
                                    <th>GitHub Url</th>
                                    <th>Social Media</th>
                                    <th>Comments</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach ($promoters as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->wallets}}</td>
                                    <td>{{$item->comments}}</td>
                                    <td><a href="{{ url('promoters_edit', $item->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{ url('promoters_delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
         </div>


     @include('layouts.footer')

</body>

</html>
