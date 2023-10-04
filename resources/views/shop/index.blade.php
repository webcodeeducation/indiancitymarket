@extends('layouts.app')
@section('content')
<div class="brand clearfix">
    <a href="/admin" style="font-size: 20px;">Indiancitymarket</a>  
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">

            <li class="ts-account">
                <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
                <ul>
                    <li><a href="/change-password">Change Password</a></li>
                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="ts-main-content">
    @include('layouts.shop_navigation')
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Dashboard</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">5</div>
                                                    <div class="stat-panel-title text-uppercase">Reg Users</div>
                                                </div>
                                            </div>
                                            <a href="reg-users.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-success text-light">
                                                <div class="stat-panel text-center">
                                                                                                    <div class="stat-panel-number h1 ">5</div>
                                                    <div class="stat-panel-title text-uppercase">Listed Vehicles</div>
                                                </div>
                                            </div>
                                            <a href="manage-vehicles.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-info text-light">
                                                <div class="stat-panel text-center">

                                                    <div class="stat-panel-number h1 ">4</div>
                                                    <div class="stat-panel-title text-uppercase">Total Bookings</div>
                                                </div>
                                            </div>
                                            <a href="manage-bookings.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-warning text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">6</div>
                                                    <div class="stat-panel-title text-uppercase">Listed Brands</div>
                                                </div>
                                            </div>
                                            <a href="manage-brands.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



<div class="row">
                    <div class="col-md-12">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <div class="stat-panel-number h1 ">1</div>
                                                    <div class="stat-panel-title text-uppercase">Subscibers</div>
                                                </div>
                                            </div>
                                            <a href="manage-subscribers.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-success text-light">
                                                <div class="stat-panel text-center">
                                                                                                    <div class="stat-panel-number h1 ">1</div>
                                                    <div class="stat-panel-title text-uppercase">Queries</div>
                                                </div>
                                            </div>
                                            <a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-info text-light">
                                                <div class="stat-panel text-center">

                                                    <div class="stat-panel-number h1 ">2</div>
                                                    <div class="stat-panel-title text-uppercase">Testimonials</div>
                                                </div>
                                            </div>
                                            <a href="testimonials.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>









            </div>
        </div>
    </div>
@endsection
