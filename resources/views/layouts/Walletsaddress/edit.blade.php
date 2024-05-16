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
                            <h3 class="text-primary  ml-5">Wallets Address Update</h3>
                            <form action="{{url('wallet_addresses_update', $Walletsaddress->id)}}" method="post" class="mt-5 ml-5">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="holder_name" value="{{$Walletsaddress->holder_name}}" placeholder="blockchain Plateform" id="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="holder_category" value="{{$Walletsaddress->holder_category}}" placeholder="blockchain Plateform" id="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" value="{{$Walletsaddress->address}}" placeholder="blockchain Plateform" id="">
                                </div>
                                <input type="submit" name="submit" class="btn btn-info" id="">
                                <a href="{{url('wallet_addresses_list')}}" class="btn btn-success">List</a>
                            </form>
                        </div>
                    </div>
                </div>
         </div>


     @include('layouts.footer')

</body>

</html>
