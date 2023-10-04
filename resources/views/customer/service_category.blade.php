<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--link rel="stylesheet" href="{{ URL::asset('public/assets/css/font-awesome.min.css') }}"-->
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/dataTables.bootstrap.css') }}">

  <!--link rel="stylesheet" href="{{ URL::asset('public/assets/fonts/fontawesome.css') }}"-->
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/datepicker3.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/all.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/select2.min.css') }}">
  
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/jquery.fancybox.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/summernote.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/style.css') }}">
	


	<style>
		.skin-blue .wrapper,
		.skin-blue .main-header .logo,
		.skin-blue .main-header .navbar,
		.skin-blue .main-sidebar,
		.content-header .content-header-right a,
		.content .form-horizontal .btn-success {
			background-color: #4172a5!important;
		}

		.content-header .content-header-right a,
		.content .form-horizontal .btn-success {
			border-color: #4172a5!important;
		}
		
		.content-header>h1,
		.content-header .content-header-left h1,
		h3 {
			color: #4172a5!important;
		}

		.box.box-info {
			border-top-color: #4172a5!important;
		}

		.nav-tabs-custom>.nav-tabs>li.active {
			border-top-color: #f4f4f4!important;
		}

		.skin-blue .sidebar a {
			color: #fff!important;
		}

		.skin-blue .sidebar-menu>li>.treeview-menu {
			margin: 0!important;
		}
		.skin-blue .sidebar-menu>li>a {
			border-left: 0!important;
		}

		.nav-tabs-custom>.nav-tabs>li {
			border-top-width: 1px!important;
		}

	</style>



</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

@include('customer.partials.header')

<section class="content">

  <div class="row">

    <div class="col-md-10 col-sm-10 col-xs-12">
      
      <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#singleserviceModal">Single Service</button>
  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#multiserviceModal">Multi Service</button>
<div class="alert alert-success showinfo" style="display:none;">
  
</div>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
  <!-- Modal -->
  <div class="modal fade" id="singleserviceModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Single Services</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="registerform">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">Service Image</label>
                                <div class="col-md-6">
                                    <input type="file" id="service_file" class="form-control" name="service_file" required="">
                                </div>
                            </div>
                          <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">Customer ID</label>
                                <div class="col-md-6">
                                    <input type="text" id="shopname" class="form-control" name="shopname" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">Service Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="shopname" class="form-control" name="shopname" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="address" class="form-control" name="address" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <input type="text" id="country" class="form-control" name="country" value="India" required="" autofocus="" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <input type="text" id="state" class="form-control" name="state" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <input type="text" id="city" class="form-control" name="city" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pincode" class="col-md-4 col-form-label text-md-right">Pincode</label>
                                <div class="col-md-6">
                                    <input type="text" id="pincode" class="form-control" name="pincode" value="" required="" autofocus="">
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>
                                <div class="col-md-6">
                                    <input type="text" id="area" class="form-control" name="area" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary btnRegister">
                                    Register
                                </button>
                            </div>
                    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="multiserviceModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Multi Services</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" id="registerform">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                         
                            <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">Shop Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="shopname" class="form-control" name="shopname" value="" required="" autofocus="">
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">Customer ID</label>
                                <div class="col-md-6">
                                    <input type="text" id="shopname" class="form-control" name="shopname" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="address" class="form-control" name="address" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <input type="text" id="country" class="form-control" name="country" value="India" required="" autofocus="" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <input type="text" id="state" class="form-control" name="state" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <input type="text" id="city" class="form-control" name="city" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pincode" class="col-md-4 col-form-label text-md-right">Pincode</label>
                                <div class="col-md-6">
                                    <input type="text" id="pincode" class="form-control" name="pincode" value="" required="" autofocus="">
                                </div>
                            </div>
                              
                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">Home Service</label>
                                <div class="col-md-6">
                                    <div class="radio">
                                    <label><input type="radio" name="optradio" value="yes" checked>Yes</label>
                                    <label><input type="radio" name="optradio" value="no" checked>No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>
                                <div class="col-md-6">
                                    <input type="text" id="area" class="form-control" name="area" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="text" id="area" class="form-control" name="area" value="" required="" autofocus="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">Website</label>
                                <div class="col-md-6">
                                    <input type="text" id="area" class="form-control" name="area" value="" required="" autofocus="">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary btnRegister">
                                    Register
                                </button>
                            </div>
                    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


    </div>




   

  </div>


</section>		

	<script src="{{ URL::asset('public/assets/js/jquery-2.2.4.min.js') }}"></script>
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script-->
	<script src="{{ URL::asset('public/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/select2.full.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jscolor.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.inputmask.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.inputmask.date.extensions.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.inputmask.extensions.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/moment.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/icheck.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/fastclick.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.sparkline.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.fancybox.pack.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/app.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/summernote.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/demo.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/admin.js') }}"></script>
  <script>
$(document).ready(function(){
    $(".alert-success").fadeOut(4000);
  
});
  </script>
</body>
</html>