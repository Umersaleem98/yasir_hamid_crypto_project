<!DOCTYPE html>
<html lang="en">
<head>
    <title>Projects Preview</title>
    @include('template.css')
</head>
<body>
  <!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <main id="main">
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <!-- Left Sidebar -->
            <div class="col-md-2 mt-5" >
                <div class="card" style="height:400px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Filter</h5>
                        <!-- Filter by Category -->
                        <div class="list-group mt-3">
                            <form action="" method="GET">
                              <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Categories
                                </button>
                            <div class="dropdown-menu" aria-labelledby="categoryDropdown">

                        <a class="dropdown-item" href="#">
                            <input type="checkbox" name="category_id[]" id="category" value="">
                            <label for=""></label>
                        </a>
                </div>
            </div>
                            <button type="submit" class="btn btn-primary btn-sm
                            mt-3">Apply Filter</button>
                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <!-- Center Content Area -->
            <div class="col-md-8 mt-3">

            <!-- Center Content Area -->
            <div class="row">
                <div class="col-md-6">
                <form action="" method="GET" class="ml-5">
    <div class="row g-3 align-items-center">
        <div class="col">
            <label for="searchInput" class="visually-hidden">Search Projects</label>
            <input type="search" class="form-control" id="searchInput" name="search" placeholder="Search Projects" value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{url('manage_project_home')}}" class="btn btn-info">Reset</a>
        </div>
    </div>
</form>
                </div>
            </div>
    <!-- <p class="text-center">This is the center content area where your main content will go.</p> -->
    <div class="row">
        @if ($projects)
        <div class="card mt-5 col-12">
            <h1>Project Details</h1>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6"> <img src="{{ asset('products/'. $projects->projectLogo) }}" style="width: 100%; max-height: 450px;"></div>
                    <div class="col-md-6">
                     <h1>Project Title</h1>
                     <h2><span>project Name</span> {{ $projects->projectName }}</h2>
                    </div>

                </div>
            </div>
@else
    <p>Project not found.</p>
@endif
        </div>
    </div>
    <br>
<!-- Centered pagination links -->
            <div class="centered-pagination-container">
                <span class="pagination"></span>
            </div>
            </div>
            <!-- Right Sidebar for Google Ads -->
            <div class="col-sm-2 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Google Ads</h5>
                        <!-- Your Google Ads content goes here -->
                        <img src="https://via.placeholder.com/300x600" alt="Google Ads" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<br>
<br>
<br>

@include('template.footer')
</body>

</html>
