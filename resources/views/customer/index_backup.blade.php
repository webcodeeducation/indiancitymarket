
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

	<div class="wrapper">

		<header class="main-header">

			<a href="/admin" class="logo">
				<span class="logo-lg">Bhagwati</span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li>
							<a href="http://bhagwatitechnoindustries.com/" target="_blank">Visit Website</a>
						</li>

						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="http://www.mindhatsolutions.com/portal/webcreator/public/uploads/user-.jpg" class="user-image" alt="user photo">
								<span class="hidden-xs"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="http://www.mindhatsolutions.com/portal/webcreator/admin/profile" class="btn btn-default btn-flat">Edit Profile</a>
									</div>
									<div>
										<a href="/logout" class="btn btn-default btn-flat">Log out</a>
									</div>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>

			</nav>
		</header>

  		
  		<aside class="main-sidebar">
    		<section class="sidebar">

     
      			<ul class="sidebar-menu">

			        <li class="treeview active">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/dashboard">
			            <i class="fa fa-laptop"></i> <span>Dashboard</span>
			          </a>
			        </li>


								        <li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/setting">
			            <i class="fa fa-cog"></i> <span>Settings</span>
			          </a>
			        </li>

			        <li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/page">
			            <i class="fa fa-file-text"></i> <span>Page</span>
			          </a>
			        </li>

			        <li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/language">
			            <i class="fa fa-language"></i> <span>Language</span>
			          </a>
			        </li>
			      
			        <li class="treeview ">
						<a href="#">
							<i class="fa fa-newspaper-o"></i>
							<span>News</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="http://www.mindhatsolutions.com/portal/webcreator/admin/category"><i class="fa fa-circle-o"></i>Category</a></li>
							<li><a href="http://www.mindhatsolutions.com/portal/webcreator/admin/news"><i class="fa fa-circle-o"></i> News</a></li>
							<li><a href="http://www.mindhatsolutions.com/portal/webcreator/admin/comment"><i class="fa fa-circle-o"></i> Comment</a></li>
						</ul>
					</li>

					<li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/event">
			            <i class="fa fa-calendar"></i> <span>Event</span>
			          </a>
			        </li>

					<li class="treeview ">
						<a href="#">
							<i class="fa fa-comment"></i>
							<span>Subscriber</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="http://www.mindhatsolutions.com/portal/webcreator/admin/subscriber"><i class="fa fa-circle-o"></i>All Subscribers</a></li>
							<li><a href="http://www.mindhatsolutions.com/portal/webcreator/admin/subscriber/send_email"><i class="fa fa-circle-o"></i>Email to Subscribers</a></li>
						</ul>
					</li>

			        <li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/team_member">
			            <i class="fa fa-users"></i> <span>Team Member</span>
			          </a>
			        </li>

			        <li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/slider">
			            <i class="fa fa-picture-o"></i> <span>Slider</span>
			          </a>
			        </li>

			        <li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/testimonial">
			            <i class="fa fa-user-plus"></i> <span>Testimonial</span>
			          </a>
			        </li>

			        <li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/photo">
			            <i class="fa fa-camera"></i> <span>Photo Gallery</span>
			          </a>
			        </li>

			        <li class="treeview ">
			          <a href="http://www.mindhatsolutions.com/portal/webcreator/admin/pricing_table">
			            <i class="fa fa-usd"></i> <span>Pricing Table</span>
			          </a>
			        </li>

			        <li class="treeview ">
						<a href="#">
							<i class="fa fa-bars"></i>
							<span>Portfolio</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="http://www.mindhatsolutions.com/portal/webcreator/admin/portfolio_category"><i class="fa fa-circle-o"></i> Portfolio Category</a></li>
							<li><a href="http://www.mindhatsolutions.com/portal/webcreator/admin/portfolio"><i class="fa fa-circle-o"></i> Portfolio</a></li>
						</ul>
					</li>			        	        

			                
      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper"><section class="content-header">
  <h1>Dashboard</h1>
</section>

<section class="content">

  <div class="row">

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total News Categories</span>
          <span class="info-box-number">4</span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total News</span>
          <span class="info-box-number">5</span>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Events</span>
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