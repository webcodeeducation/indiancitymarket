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

@include('customer.partials.header')

<section class="content">

  <div class="row">

    <div class="col-md-8 col-sm-8 col-xs-12 col-lg-8">

<div class="row">
        <!-- edit form column -->
        <div class="col-lg-4 text-lg-center">
            <h2>Edit Profile</h2>
        </div>
        <!--div class="col-lg-8">
            <div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a>
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div-->
            <div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8 push-lg-4 personal-info">
             <form action="/updateprofilefields" method="post" role="form">
             	{{csrf_field()}}
                   <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="email" value="{{$user->email}}" />
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                    <div class="col-lg-9">
                        <select id="user_time_zone" class="form-control" size="0">
                            <option value="Hawaii">(GMT-10:00) Hawaii</option>
                            <option value="Alaska">(GMT-09:00) Alaska</option>
                            <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                            <option value="Arizona">(GMT-07:00) Arizona</option>
                            <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                            <option value="Central Time (US &amp; Canada)"
                            selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                            <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                            <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" value="{{$user->username}}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <input type="reset" class="btn btn-secondary" value="Cancel" />
                        <input type="submit" class="btn btn-primary" value="Save Changes" />
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 pull-lg-8 text-xs-center">
        	    <form action="/updateprofile" method="post" role="form" enctype="multipart/form-data">
        	    	{{csrf_field()}}
                <img src="{{ URL::asset('public/assets/images/profile') }}/{{$user->user_profile}}" class="m-x-auto img-fluid img-thumbnail" alt="{{$user->username}}" style="width: 150px;" />
                <h6 class="m-t-2">Upload a different photo</h6>
                <label class="custom-file">
                  <input type="file" name="profile_photo" id="profile_photo" class="custom-file-input" required="required">
                  <span class="custom-file-control">Choose file</span>
                </label>
                <input type="submit" class="btn btn-primary" value="Upload" />
            </form>
        </div>
        </div>

        <div class="row">
        <div class="col-lg-8 push-lg-4 personal-info">
             <form action="/updatepassword" method="post" role="form">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="password" name="password" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="password" name="confirm_password" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <input type="reset" class="btn btn-secondary" value="Cancel" />
                        <input type="submit" class="btn btn-primary" value="Change Password" />
                    </div>
                </div>
            </form>
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