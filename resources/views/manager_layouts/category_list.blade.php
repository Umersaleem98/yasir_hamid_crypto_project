<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Project</title>
    @include('layouts.css')
    <style>
        /* .d-inline-block {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
        } */

        .pagination {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination a {
  color: black;
  padding: 8px 16px;
  text-decoration: none;
  border: 1px solid #ddd;
  margin: 0 5px;
}

.pagination a.active {
  background-color: #007bff;
  color: white;
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


                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-primary">Category List</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                                        <div class="card-header text-primary underline">Add Category</div>


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
                                                    <div class="col-md-12">
                                                        <table class="table table-sm table-bordered">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Category Name</th>
                                                                <th>Description</th>
                                                                <th>Category Image</th>
                                                                <th>Subcategory Name</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            @foreach($categories as $category)
                                                            <tr>
                                                                <td>{{ $category->id }}</td>
                                                                <td>{{ $category->name }}</td>
                                                                <td>
                                                                    @if (strlen($category->description) > 60)
                                                                    {{ substr($category->description, 0, 60) }}...
                                                                    <!-- Truncate description to 60 characters -->
                                                                    <span class="d-inline-block" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        title="{{ $category->description }}">
                                                                        <a href="#" class="btn btn-link">Read
                                                                            more</a>
                                                                    </span>
                                                                    @else
                                                                    {{ $category->description }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($category->images)
                                                                    <img src="{{ ('images/umer/' . $category->images) }}"
                                                                        alt="{{$category->images}}"
                                                                        style="max-width: 100px; max-height: 50px;">
                                                                    @else
                                                                    No Image
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @foreach($category->subcategories as $subcategory)
                                                                    <td>{{ $subcategory->name }}</td>
                                                                    <td>
                                                                        @if ($subcategory->description)
                                                                        @if (strlen($subcategory->description) > 50)
                                                                        {{ substr($subcategory->description, 0, 60) }}...
                                                                        <!-- Truncate description to 60 characters -->
                                                                        <span class="d-inline-block"
                                                                            data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            title="{{ $subcategory->description }}">
                                                                            <a href="#" class="btn btn-link">Read
                                                                                more</a>
                                                                        </span>
                                                                        @else
                                                                        {{ $subcategory->description }}
                                                                        @endif
                                                                        @else
                                                                        No Description
                                                                        @endif
                                                                    </td>
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    <form
                                                                        action="{{ url('categories_delete', $category->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('categories_edit', $category->id) }}"
                                                                        class="btn btn-info">Update</a>
                                                                </td>
                                                                </form>
                                                            </tr>
                                                            @endforeach

                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="pagination">
                                                    @if ($categories->onFirstPage())
                                                      <span>&laquo;</span>
                                                    @else
                                                      <a href="{{ $categories->previousPageUrl() }}">&laquo;</a>
                                                    @endif

                                                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                                                      @if ($i == $categories->currentPage())
                                                        <a href="#" class="active">{{ $i }}</a>
                                                      @else
                                                        <a href="{{ $categories->url($i) }}">{{ $i }}</a>
                                                      @endif
                                                    @endfor

                                                    @if ($categories->hasMorePages())
                                                      <a href="{{ $categories->nextPageUrl() }}">&raquo;</a>
                                                    @else
                                                      <span>&raquo;</span>
                                                    @endif
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

            <script>
                $(document).ready(function() {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>

</body>

</html>
