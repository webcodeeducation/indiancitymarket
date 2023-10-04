
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Indiancitymarket Shop Panel: Add Photo & Video</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--link rel="stylesheet" href="{{ URL::asset('public/assets/css/font-awesome.min.css') }}"-->
  <!--link rel="stylesheet" href="{{ URL::asset('public/assets/css/dataTables.bootstrap.css') }}"-->

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
      
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>


<!--Start Datatable here -->

  <div class="row">

    <div class="col-md-6 col-sm-12 col-xs-12">


                            <form class="form-horizontal" action="/customer/savephoto" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
<fieldset>

                              <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">Add Photo</label>
                                <div class="col-md-6">
                                  <div class="radio">
                                    <label class="checkbox-inline"><input type="radio" name="photo_type" value="1">Single</label>
                                  </div>
                                  <div class="radio">
                                    <label class="checkbox-inline"><input type="radio" name="photo_type" value="2">Groups</label>
                                  </div>
                                    <input type="file" id="fungame_photo" name="fungame_photo[]" required="required" multiple="multiple">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="resale_cat" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input type="text" id="photo_title" name="photo_title" value="" required="required">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>

</fieldset>

</form>

</div>
    <div class="col-md-6 col-sm-12 col-xs-12">
<form action="/deletephoto" method="post">
  {{csrf_field()}}
  @foreach($photo as $img)
    <img src="{{ URL::asset('public/assets/images/fungame/photos') }}//{{$img}}" class="img-thumbnail" alt="Cinque Terre" style="width:400px;height:170px">
    @endforeach

<button type="submit" class="btn btn-danger">Delete Photo</button>
</form>
</div>
</div>


<div class="row">

    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">


                            <form class="form-horizontal" action="/customer/savevideo" method="post" enctype="multipart/form-data">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
<fieldset>

                              <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">Add Video</label>
                                <div class="col-md-6">
                                    <input type="file" id="fungame_video" name="fungame_video" required="required">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="resale_cat" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input type="text" id="video_title" name="video_title" value="" required="required">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>

</fieldset>
</form>

</div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
<form method="post">
  {{csrf_field()}}
  @if(empty($video->video_filename))
    <video width="400" controls>
  <source src="{{ URL::asset('public/assets/images/fungame/videos') }}/{{$video->video_filename}}/" type="video/mp4">
  <source src="{{ URL::asset('public/assets/images/fungame/videos') }}/{{$video->video_filename}}" type="video/ogg">
  Your browser does not support HTML5 video.
</video>
@else
    <video width="400" controls>
  <source src="{{ URL::asset('public/assets/images/fungame/videos') }}/{{$video->video_filename}}" type="video/mp4">
  <source src="{{ URL::asset('public/assets/images/fungame/videos') }}/{{$video->video_filename}}" type="video/ogg">
  Your browser does not support HTML5 video.
</video>
@endif

<button type="submit" class="btn btn-danger">Delete Video</button>
</form>
</div>
</div>
                                
<!--Start Datatable end form -->
    </div>




   

  </div>


</section>    

  <script src="{{ URL::asset('public/assets/js/jquery-2.2.4.min.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/bootstrap.min.js') }}"></script>
  <!-- <script src="{{ URL::asset('public/assets/js/select2.full.min.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/jscolor.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/jquery.inputmask.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/jquery.inputmask.date.extensions.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/jquery.inputmask.extensions.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/moment.min.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/bootstrap-datepicker.js') }}"></script> -->
  <!-- <script src="{{ URL::asset('public/assets/js/icheck.min.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/fastclick.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/jquery.sparkline.min.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/jquery.fancybox.pack.js') }}"></script>
   --><script src="{{ URL::asset('public/assets/js/app.min.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/summernote.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ URL::asset('public/assets/js/demo.js') }}"></script>
  <!--script src="{{ URL::asset('public/assets/js/shop.js') }}"></script-->

</body>
</html>