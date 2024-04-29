<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Project</title>
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


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">



                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Add Category</div>

                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <div class="card-body">
                                    <div class="container ">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <form action="{{ url('categories_store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="category_name">Category Name:</label>
                                                        <input type="text" name="category_name" id="category_name" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subcategory_name">Subcategory Name:</label>
                                                        <input type="text" name="subcategory_name" id="subcategory_name" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Image:</label>
                                                        <input type="file" name="image" id="image" class="form-control" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->


            </div>




         </div>


     @include('layouts.footer')

</body>

</html>
