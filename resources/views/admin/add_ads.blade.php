
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Indiancitymarket Admin Panel: Products</title>

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
  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Create New Ads</button>
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Ads</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="/saveAds" method="post" id="adsform" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="form-group">
      <label class="control-label col-sm-2" for="category">Ads Image:</label>
      <div class="col-sm-10">
    <!-- <input type="file" name="ad_photo" id="ad_photo" required="required" /> -->
    <input type="file" name="ad_photo" id="ad_photo"/>
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category:</label>
      <div class="col-sm-10">
        <select class="form-control" name="categoryname">
          <option value="0">Select Category</option>
        @foreach ($categories as $key => $value)
            <option value="{{$value->id}}">{{$value->category_name}}</option>
          @endforeach
          </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ads_title">Ads Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ads_title" placeholder="Enter Ads Title" name="ads_title" value="">
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="prod_descp">Ads Description:</label>
      <div class="col-sm-10">
        <!--input type="text" class="form-control" id="prod_description" placeholder="Enter Product Description" name="prod_description" value=""-->
        <textarea class="form-control" name="ads_description" rows="5" id="ads_description" value=""></textarea>
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="ads_price">Ads Price:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ads_price" placeholder="Enter Ads Price" name="ads_price" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="ads_city">Ads City:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ads_city" placeholder="Enter Ads City" name="ads_city" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="ads_tags">Ads Tags:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ads_tags" placeholder="Enter Ads Tags" name="ads_tags" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="brand_name">Brand Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="brand_name" placeholder="Enter Brand Name" name="brand_name" value="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="phone_number">Phone Number:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="phone_number" placeholder="Enter Phone Number" name="phone_number" value="">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btnSaveProduct1">Submit</button>
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

  <!-- Modal -->

<!--Start Datatable here -->


                            <table class="table table-bordered ajaxTable tblads" id="tblads" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Category</th>
                                  <th>SubCategory</th>
                                  <th>Type</th>
                                  <th>Volt</th>
                                  <th>Capacity</th>
                                  <th>L+5</th>
                                  <th>W+5</th>
                                  <th>H+5</th>
                                  <th>Current Start</th>
                                  <th>Current Start</th>
                                 
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th>Category</th>
                                  <th>SubCategory</th>
                                  <th>Type</th>
                                  <th>Volt</th>
                                  <th>Capacity</th>
                                  <th>L+5</th>
                                  <th>W+5</th>
                                  <th>H+5</th>
                                  <th>Current Start</th>
                                  <th>Current Start</th>
                                </tr>
                              </tfoot>
                            </table>
                                
<!--Start Datatable end form -->
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
  <!--script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script-->
  <script src="{{ URL::asset('public/assets/js/admin.js') }}"></script>




  
  <script type="text/javascript">
       
    </script>
</body>
</html>