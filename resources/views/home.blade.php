@extends('layouts.dashboard_app')


@section('dashboard_content')

 <!-- Start Content-->
 <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Welcome !</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Restrurant</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!--Widget-4 -->
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md bg-info rounded-circle mr-2">
                        <i class="ion-logo-usd avatar-title font-26 text-white"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-right">
                            <h4 class="font-20 my-0 font-weight-bold"><span data-plugin="counterup">15852</span></h4>
                            <p class="mb-0 mt-1 text-truncate">Total Sales</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h6 class="text-uppercase">Target <span class="float-right">60%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md bg-purple rounded-circle">
                        <i class="ion-md-cart avatar-title font-26 text-white"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-right">
                            <h4 class="font-20 my-0 font-weight-bold"><span data-plugin="counterup">956</span></h4>
                            <p class="mb-0 mt-1 text-truncate">New Orders</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h6 class="text-uppercase">Target <span class="float-right">90%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                            <span class="sr-only">90% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md bg-success rounded-circle">
                        <i class="ion-md-contacts avatar-title font-26 text-white"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-right">
                            <h4 class="font-20 my-0 font-weight-bold"><span data-plugin="counterup">5210</span></h4>
                            <p class="mb-0 mt-1 text-truncate">New Users</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h6 class="text-uppercase">Target <span class="float-right">57%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                            <span class="sr-only">57% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box">
                <div class="media">
                    <div class="avatar-md bg-primary rounded-circle">
                        <i class="ion-md-eye avatar-title font-26 text-white"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="text-right">
                            <h4 class="font-20 my-0 font-weight-bold"><span data-plugin="counterup">20544</span></h4>
                            <p class="mb-0 mt-1 text-truncate">Unique Visitors</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h6 class="text-uppercase">Target <span class="float-right">60%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->


@endsection