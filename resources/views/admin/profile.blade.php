
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}">
	<!--link rel="stylesheet" href="{{ URL::asset('public/assets/css/font-awesome.min.css') }}"-->
	<link rel="stylesheet" href="{{ URL::asset('public/assets/fonts/fontawesome.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('public/assets/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('public/assets/css/datepicker3.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('public/assets/css/all.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('public/assets/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('public/assets/css/dataTables.bootstrap.css') }}">
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

@include('admin.partials.header')

<section class="content">

  <div class="row">

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Categories</span>
          <span class="info-box-number">4</span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Products</span>
          <span class="info-box-number">5</span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Sales</span>
          <span class="info-box-number">3</span>
        </div>
      </div>
    </div>
   

  </div>


</section>		</div>

	</div>

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

	<script>



	</script>

	<script type="text/javascript">


        
    </script>
</body>
</html>