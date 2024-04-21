<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Projects</title>
@include('template.css')
</head>

<body>


    @include('template.topbar2')
    @include('template.topnav')

  <!-- ======= Header ======= -->
    @include('template.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <main id="main">
    <div class="container-fluid mt-3">
        <div class="row">
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
                <div class="col-6">
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

    <div class="col-md-4 mt-5">
            <div class="card" style="width: 18rem;">
                <div class="row">
                <div class="col-md-6">
                <img src="img/a.jpg" class="card-img-top" alt="...">
                </div>
                <div class="col-md-6">

                    <h5 class="card-title mt-5"></h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->


                </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Category</li>
                    <li class="list-group-item">Launch Date</li>
                    <li class="list-group-item">A second item</li>
                </ul>
                <div class="card-body">
                <a href="" class="card-link">View Project</a>
                </div>
            </div>
        </div>


</div>
<br>
<!-- Centered pagination links -->
<div class="centered-pagination-container">
    <span class="pagination"></span>
</div>


            </div>
            <!-- Right Sidebar for Google Ads -->
            <div class="col-md-2 mt-5">
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





  <!-- Yasir Hameed -->

  <!-- ======= Footer ======= -->
@include('template.footer')

</body>

</html>
