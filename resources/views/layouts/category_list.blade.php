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
                                            <div class="col-md-10">
                                                <table class="table table-sm table-bordered">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Category Name</th>
                                                        <th>Category Image</th>
                                                        <th>Subcategory Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            @if($category->images)
                                                                <img src="{{ ('images/umer/' . $category->images) }}" alt="{{$category->images}}" style="max-width: 100px; max-height: 50px;">
                                                                {{-- <img src="{{ ('products/'. $project->projectLogo)}} " style="max-width: 100px; max-height: 50px;"> --}}
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                @foreach($category->subcategories as $subcategory)
                                                                    <li>{{ $subcategory->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('categories_delete', $category->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </td>
                                                            <td>
                                                            <a href="{{ url('categories_edit', $category->id) }}" class="btn btn-info">Update</a>
                                                        </td>
                                                    </form>
                                                    </tr>
                                                @endforeach

                                                </table>
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
