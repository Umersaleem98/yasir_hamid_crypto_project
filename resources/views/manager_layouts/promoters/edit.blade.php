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

                        <div class="col-md-6">
                            <h3 class="text-primary  ml-5">Promoter Update</h3>
                            <form action="{{url('promoters_update', $promoters->id)}}" method="post" class="mt-5 ml-5">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{$promoters->name}}" placeholder="blockchain Plateform" id="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="type" value="{{$promoters->type}}" placeholder="blockchain Plateform" id="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="wallets" value="{{$promoters->wallets}}" placeholder="blockchain Plateform" id="">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="comments" placeholder="Blockchain Platform" id="">{{ $promoters->comments }}</textarea>
                                </div>

                                <input type="submit" name="submit" class="btn btn-info" id="">
                                <a href="{{url('promoters_list')}}" class="btn btn-success">List</a>
                            </form>
                        </div>
                    </div>
                </div>
         </div>


     @include('layouts.footer')

</body>

</html>
