
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Indiancitymarket Shop Panel: Add Product</title>

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
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/editor.css') }}">
  


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
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>

<!--Start Datatable here -->

  <h2>Post New News</h2>
  <p>If want to post new news, please fill free to post news on our website.</p>
  <form class="form-horizontal" action="/shop/postnews" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
         <div class="form-group row"> 
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">News Category</label>
                                <div class="col-md-6">
                                  <select class="form-control" id="sel1" name="news_category">
                                    <option value="">Select Category</option>
                                  @foreach($newscategories as $key1=>$value1)
                                    <option value="{{$value1->id}}">{{$value1->news_category_name}}</option>
                                  @endforeach
    
  </select>
                                </div>
                            </div>
     <div class="form-group row">
                                <label for="header" class="col-md-4 col-form-label text-md-right">Header Image</label>
                                <div class="col-md-6">
                                    <input type="file" id="header" name="header" required="required">
                                </div>
                            </div>
    <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">News Title</label>
                                <div class="col-md-6">
                                    <input type="text" id="news_title" class="form-control" name="news_title" value="" required="required" autofocus="">
                                </div>
                            </div>

                            <div class="form-group row">
                                 <label for="comment">Enter News Here:</label>
      <div class="col-md-6">
          <textarea class="form-control" rows="5" name="news" id="news"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
      <div class="col-md-6">
         <button type="submit" class="btn btn-primary btnRegister1">
                                    Post News
                                </button>
                                </div>
                            </div>
  </form>
                                
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
  <script src="{{ URL::asset('public/assets/js/shop.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/editor.js') }}"></script>
    <script>
      $(document).ready(function() {
        $("#txtEditor").Editor();
      });
    </script>
</body>
</html>