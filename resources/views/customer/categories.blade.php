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

@include('admin.partials.header')

<section class="content">

  <div class="row">

    <div class="col-md-10 col-sm-10 col-xs-12">
      
      <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add Category</button>
<div class="alert alert-success showinfo" style="display:none;">
  
</div>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Category</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="/savecategory" method="post" id="categoryform" enctype="multipart/form-data">
          	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category Image:</label>
      <div class="col-sm-10">
        <input type="file" id="logo" name="logo">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="category" placeholder="Enter Category" name="category" value="">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btnSaveCategory1" id="uploadcategory1">Submit</button>
      </div>
    </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--Start Datatable and form -->

<!-- tile body -->
                            <table class="table table-bordered ajaxTable tblcategories" id="tblcategories" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Category</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th>ID</th>
                                  <th>Category</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </tfoot>
                            </table>
                                <!-- /tile body -->
<!--Start Datatable and form -->
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