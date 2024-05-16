<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.css')
<style>
    /* Custom styles for Laravel pagination */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination > ul {
    display: inline-flex;
    list-style: none;
    padding-left: 0;
}

.pagination > ul > li {
    margin: 0 5px;
}

.pagination > ul > li > a,
.pagination > ul > li > span {
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    text-decoration: none;
    color: #333;
}

.pagination > ul > li.active > a,
.pagination > ul > li.active > span {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

.pagination > ul > li.disabled > span,
.pagination > ul > li.disabled > a {
    color: #999;
    pointer-events: none;
}

</style>
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
                        <div class="col-md-8">
                            <h3 class="text-primary mt-5 ml-5">Social Media List</h3>
                            <table class="table table-bordered mt-3 ml-5">
                                <tr>
                                    <th>ID</th>
                                    <th>Social Media</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach ($socialmedia as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->social_media_name}}</td>
                                    <td><a href="{{ url('socialmedia_edit', $item->id) }}" class="btn btn-sm btn-primary">Update</a></td>
                                    <td>
                                        <a href="{{ url('socialmedia_delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                    </td>
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
