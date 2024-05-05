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
                    <h1 class="h3 mb-0 text-primary">Add Project</h1>
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
                                    <div class="card-header text-primary underline">Add Project</div>

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
                                        <form method="post" action="{{url('project_store')}}" enctype = "multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Project Name</label> --}}
                                                    <input type="text"  class="form-control" id="projectName" name="projectName" placeholder="Project Name">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Project Symbol</label> --}}
                                                    <input type="text" class="form-control" id="projectSymbol" name="projectSymbol" placeholder="Project Symbol">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Project Logo</label> --}}
                                                    <input type="file" class="form-control" id="projectLogo" name="projectLogo" placeholder="Project Logo">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label for="selectProjectType" class="form-label">Select Project Type</label><br> --}}
                                                    <select name="selectProjectType" id="selectProjectType" class="form-select" aria-label="Select Project Type">
                                                        <option value="" selected disabled>Select Project Type</option>
                                                        @foreach($project_type as $type)
                                                        <option value="{{$type->id}}">{{$type->categoryName}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label for="selectProjectType" class="form-label">Select Project Category</label><br> --}}
                                                    <select name="selectProjectCategory" id="" class="form-select" aria-label="Select Project Type">
                                                        <option value="" selected disabled>Select Project Category</option>
                                                        @foreach($project_category as $cate)
                                                        <option value="{{$cate->id}}">{{$cate->categoryName}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label for="selectProjectType" class="form-label">Select Project Standard</label><br> --}}
                                                    <select name="selectProjectStandard" id="" class="form-select" aria-label="Select Project Type">
                                                        <option value="" selected disabled>Select Project Standard</option>
                                                        @foreach($project_standard as $p_standard)
                                                        <option value="{{$p_standard->id}}">{{$p_standard->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Select Project Platform</label> --}}
                                                    <input type="text" class="form-control" id="selectProjectPlatform" name="selectProjectPlatform" placeholder="Select Project Platform">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label class="form-label">Select Project Domain</label> --}}
                                                    <input type="text" class="form-control" id="selectProjectDomain" name="selectProjectDomain" placeholder="Select Project Domain">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Project Audit File</label> --}}
                                                    <input type="text" class="form-control" id="projectAuditFile" name="projectAuditFile" placeholder="Project Audit File">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Select Project Launch Date</label> --}}
                                                    <input type="date" class="form-control" id="projectLaunchDate" name="projectLaunchDate" placeholder="Select Project Launch Date">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Enter Project Website URL</label> --}}
                                                    <input type="text" class="form-control" id="projectWebsiteURL" name="projectWebsiteURL" placeholder="Enter Project Website URL">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Enter Project GitHub URL</label> --}}
                                                    <input type="text" class="form-control" id="projectGitHubURL" name="projectGitHubURL" placeholder="Enter Project GitHub URL">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label class="form-label">Select Project Total Supply</label> --}}
                                                    <input type="text" class="form-control" id="projectTotalSupply" name="projectTotalSupply" placeholder="Select Project Total Supply">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Enter Project Circulating Supply</label> --}}
                                                    <input type="text" class="form-control" id="projectCirculatingSupply" name="projectCirculatingSupply" placeholder="Enter Project Circulating Supply">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Enter Project Whitepaper URL</label> --}}
                                                    <input type="text" class="form-control" id="projectWhitepaperURL" name="projectWhitepaperURL" placeholder="Enter Project Whitepaper URL">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Select Project Social Media</label> --}}
                                                    <input type="text" class="form-control" id="selectProjectSocialMedia" name="selectProjectSocialMedia" placeholder="Select Project Social Media">
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Enter Social Media URL</label> --}}
                                                    <input type="text" class="form-control" id="enterSocialMediaURL" name="enterSocialMediaURL" placeholder="Enter Social Media URL">
                                                </div>
                                            </div>
                                            <h3 class="text-primary underline">Developer Information</h3>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label for="" class="form-label">Select Select Developer </label><br> --}}
                                                    <select name="selectDeveloper" id="" class="form-select" aria-label="Select Project Type">
                                                        <option value="" selected disabled>Select Select Developer</option>
                                                        @foreach($developers as $developer)
                                                        <option value="{{$developer->id}}">{{$developer->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label for="" class="form-label">Select  Company </label><br> --}}
                                                    <select name="selectCompany" id="" class="form-select" aria-label="Select Project Type">
                                                        <option value="" selected disabled>Select  Company</option>
                                                        @foreach($companies as $companie)
                                                        <option value="{{$companie->id}}">{{$companie->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <h3 class="text-primary underline">Promoter Information</h3>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label for="" class="form-label">Select  Promoter Name </label><br> --}}
                                                    <select name="selectPromoterName" id="" class="form-select" aria-label="Select Project Type">
                                                        <option value="" selected disabled>Select  Promoter Name</option>
                                                        @foreach($promoters as $promoter)
                                                        <option value="{{$promoter->id}}">{{$promoter->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <h3 class="text-primary underline">Private Investor Information</h3>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label for="" class="form-label">Select  Private Investor </label><br> --}}
                                                    <select name="selectPrivateInvestor" id="" class="form-select" aria-label="Select Project Type">
                                                        <option value="" selected disabled>Select  Private Investor</option>
                                                        @foreach($privatenvestors as $privatenvestor)
                                                        <option value="{{$privatenvestor->id}}">{{$privatenvestor->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Private Investor Token Release</label> --}}
                                                    <input type="text" class="form-control" id="privateInvestorTokenRelease" name="privateInvestorTokenRelease" placeholder="Private Investor Token Release">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="radioFull" class="mr-4">Full</label>
                                                    <input type="radio" class="form-check-input mr-3" id="radioFull" name="radioInvestorRelease" value="full">

                                                    <label for="radioPartial" class="mr-4">Partial</label>
                                                    <input type="radio" class="form-check-input mr-3" id="radioPartial" name="radioInvestorRelease" value="partial">

                                                    <label for="radioNo" class="mr-4">No</label>
                                                    <input type="radio" class="form-check-input" id="radioNo" name="radioInvestorRelease" value="no">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    {{-- <label  class="form-label">Comment</label> --}}
                                                    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Enter Comment"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>


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
