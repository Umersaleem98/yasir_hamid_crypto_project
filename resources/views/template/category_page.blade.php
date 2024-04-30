<!DOCTYPE html>
<html lang="en">

<head>
    <title>Accadmey</title>
    @include('template.css')
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .heading-box {
            text-align: center;
            margin-top: 20px;
        }

        .heading-box h4 {
            margin: 10px 0;
        }

        /* Custom styles for columns */
        .custom-col {
            height: 200px; /* Set desired height */
            background-color: #f0f0f0; /* Set desired background color */
            border-radius: 5px;
            margin-bottom: 20px; /* Space between columns */
            overflow: hidden; /* Hide overflow */
            position: relative; /* Position for absolute content */
        }

        .custom-col img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease; /* Smooth hover transition */
        }

        .custom-col:hover img {
            transform: scale(1.1); /* Scale up on hover */
        }

        .custom-col .content-overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Overlay color */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0; /* Initially hidden */
            transition: opacity 0.3s ease; /* Smooth transition */
        }

        .custom-col:hover .content-overlay {
            opacity: 1; /* Show overlay on hover */
        }

        .custom-col .content-overlay p {
            color: #fff; /* Text color */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            margin: 0;
            padding: 0 20px; /* Padding for text */
        }

        /* Style for the anchor tag */
        .custom-col a {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay color for anchor tag */
            color: #fff; /* Text color for anchor tag */
            text-decoration: none; /* Remove underline */
            padding: 10px 0; /* Padding for anchor tag */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .custom-col a:hover {
            background-color: rgba(0, 0, 0, 0.8); /* Darker overlay on hover */
        }
    </style>
</head>

<body>

    @include('template.topnav')

    <!-- ======= Header ======= -->
    @include('template.header')
    <!-- End Header -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <p class="heading-box" style="text-align: center;">
                    <h6 style="text-align: center;">What do you need to Learn?</h6>
                </p>
                <hr>
            </div>
            @foreach ($category as $cate)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-col">
                    <img src="{{ asset('images/umer/' . $cate->images) }}" alt="{{ $cate->images }}" >
                    {{-- <a href="{{ url('subcategory_page') }}">{{ $cate->name }}</a> --}}
                    <a href="{{ url('subcategory_page', ['id' => $cate->id]) }}">{{ $cate->name }}</a>
                </div>
            </div>
            @endforeach
            <!-- Add more columns here with images and content -->
        </div>
    </div>

    <!-- Yasir Hameed -->

    <!-- ======= Footer ======= -->
    @include('template.footer')

</body>

</html>
