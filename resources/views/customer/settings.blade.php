<?php
/*print_r($contacts);
echo $contacts[0]->email;
//die();*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bhagwati Admin Panel: Users</title>

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
	.modalsize{
		width:80%;
	}
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

@include('admin.partials.header')

<section class="content">

  <div class="row">

    <div class="col-md-10 col-sm-10 col-xs-12">
      
      <!-- Trigger the modal with a button -->
<div class="alert alert-success showinfo" style="display:none;">
  
</div>

<!--Start Datatable and form -->
 <form class="form-horizontal" action="" method="post" id="settingsform">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{$contacts[0]->id}}">
    <div class="form-group">
      <label class="control-label col-sm-2" for="website">Website:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="website" placeholder="Enter Website" name="website" value="{{$contacts[0]->website}}">
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="contact" placeholder="Enter Contact" name="contact" value="{{$contacts[0]->contact}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="{{$contacts[0]->phone}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="working_days">Working Days:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="working_days" placeholder="Enter Working Days" name="working_days" value="{{$contacts[0]->working_days}}">
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$contacts[0]->email}}">
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="{{$contacts[0]->address}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="facebook">Facebook:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="facebook" placeholder="Enter Password" name="facebook" value="{{$contacts[0]->facebook}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="twitter">Twitter:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="twitter" placeholder="Enter Twitter" name="twitter" value="{{$contacts[0]->twitter}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="whatsapp">Whatsapp:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="whatsapp" placeholder="Enter Whatsapp" name="whatsapp" value="{{$contacts[0]->whatsapp}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="googleplus">Google Plus:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="googleplus" placeholder="Enter Google Plus" name="googleplus" value="{{$contacts[0]->googleplus}}">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" class="btn btn-primary btnSaveSettings">Submit</button>
      </div>
    </div>
  </form>
<!--Start Datatable and form -->
    </div>




   

  </div>


</section>		

	<script src="{{ URL::asset('public/assets/js/jquery-2.2.4.min.js') }}"></script>
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
	<!--script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script-->

</body>
</html>