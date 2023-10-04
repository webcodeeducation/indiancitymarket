@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                </div>
            </div>
        </div>
    </div>
    <!-- Start Sidebar -->
                    <div class="row">
                        <div class="col-sm-4 col-md-3 sidebar">
                    <div class="mini-submenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                    <div class="list-group">
                        <span href="#" class="list-group-item active">
                            Submenu
                            <span class="pull-right" id="slide-submenu">
                                <i class="fa fa-times"></i>
                            </span>
                        </span>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comment-o"></i> Add Shop
                        </a>
                        <a href="/superadmin/addproduct" class="list-group-item">
                            <i class="fa fa-search"></i> Add Product
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-user"></i> Add Customer
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-folder-open-o"></i> Lorem ipsum <span class="badge">14</span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-bar-chart-o"></i> Lorem ipsumr <span class="badge">14</span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-envelope"></i> Lorem ipsum
                        </a>
                    </div>        
                </div>
    </div>
    <!-- End Sidebar -->

    
</div>
@endsection
