<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sub Category</title>
    @include('template.css')
</head>
<body>
    @include('template.topnav')
    <!-- ======= Header ======= -->
    @include('template.header')
    <!-- End Header -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center mb-3">
                    @foreach($categories as $category)
                        @if($category->images)
                            <img src="{{ asset('images/umer/' . $category->images) }}" alt="{{ $category->images }}" class="img-fluid" style="widows: 100%; height:400px">
                            @break <!-- Break the loop after first image found -->
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <h2>Category: {{ $category->name }}</h2>
                    <h3>Subcategory: {{ $subcategory->name }}</h3>
                    <p>Description: {{ $category->description }}</p>
                    <p>Description: {{ $subcategory->description }}</p>
                    
                    <!-- Add more fields as needed -->
                </div>
            </div>

            </div>
        </div>
    </div>
    <!-- Yasir Hameed -->
    <!-- ======= Footer ======= -->
    @include('template.footer')
</body>

</html>
