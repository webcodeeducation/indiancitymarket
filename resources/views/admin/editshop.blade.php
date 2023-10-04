<?php
/*echo $product[0]->prod_description;
print_r($product);
die();*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Indian City Market: Register Shop</title>

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

    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
      
      <!-- Trigger the modal with a button -->
  <a href="/admin/shops" class="btn btn-info btn-md">View Shops</a>
  <a href="/admin/jyantishop/{{$shop->id}}" class="btn btn-info btn-md">Add Product</a>
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>

  <!-- Modal -->      
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-6">
        <form class="form-horizontal" action="/updateshopnumberlogo" method="post" id="productimgform" enctype="multipart/form-data">
        <img id="preview" src="{{ URL::asset('public/assets/geeta_jyanti/shop_images') }}/{{$shop->shop_number_logo}}" width="200px" height="200px"/><br/>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="shopid" id="shopid" value="{{$shop->id}}">
        <input type="file" name="shop_number_logo" id="shop_number_logo"/>
        <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload" style="margin: 4px 10px 15px;">
        </form>
          </div>
          <div class="col-sm-6">
        <form class="form-horizontal" action="/updateshopimage" method="post" id="productimgform" enctype="multipart/form-data">
        <img id="preview" src="{{ URL::asset('public/assets/geeta_jyanti/shop_images') }}/{{$shop->shop_image}}" width="200px" height="200px"/><br/>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" name="shopid" id="shopid" value="{{$shop->id}}">
        <input type="file" name="shop_image" id="shop_image"/>
        <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload" style="margin: 4px 10px 15px;">
          </div>
        </div>
       
        </form>
      </div>

    

<!--Start Datatable and form -->
<div class="row">
          <div class="col-sm-8">

          <form class="form-horizontal" action="/updateshop" method="post" id="shopeditform">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="shopid" id="shopid" value="{{$shop->id}}">
        <div class="form-group">
      <label class="control-label col-sm-2" for="shop_type">Shop Type:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="shop_type" placeholder="Enter Shop Type" name="shop_type" value="{{$shop->shop_type}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="shop_owner">Shop Owner:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="shop_owner" placeholder="Enter Product Type" name="shop_owner" value="{{$shop->shop_owner}}">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="shop_name">Shop Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop Name" name="shop_name" value="{{$shop->shop_name}}">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="shop_phone">Phone:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="shop_phone" placeholder="Enter Shop Phone" name="shop_phone" value="{{$shop->shop_phone}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="shop_address">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="shop_address" placeholder="Enter Shop Phone" name="shop_address" value="{{$shop->shop_address}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="prod_dim_L5">Email:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="shop_email" placeholder="Enter Shop Email" name="shop_email" value="{{$shop->shop_email}}">
      </div>
    </div>
    <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Save Changes">
  </form>
</div>
<div class="col-sm-4">
  <div class="form-group">
    <form class="form-horizontal" action="/savejyantiproducts" method="post" id="shopeditform">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="shop_id" id="token" value="{{$shop->id}}">
  <label for="comment">Products:</label>
  <textarea class="form-control" rows="5" id="products" name="products">{{$shop->prod_lists}}</textarea>
  <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Save Products">
</div>
</div>
</div>
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




  
  <script type="text/javascript">
    function changeProfile1() {
        $('#image').click();
    }
    function changeProfile2() {
        $('#image').click();
    }
    $('#image').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
        else
            alert("Please select image file (jpg, jpeg, png).")
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
//              $("#remove").val(0);
            };
        }
    }
    function removeImage() {
        $('#preview').attr('src', 'noimage.jpg');
//      $("#remove").val(1);
    }  

    $(document).ready(function(){

 $('#productimgform').on('submit', function(event){
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  //formData.append('productid', $('#productid1').val());
  console.log(formData);
  $.ajax({
   url:"/admin/saveProductImage",
   method:"POST",
   data:formData,
   //dataType:'JSON',
   contentType: false,
   //cache: false,
   processData: false,
   success:function(data)
   {
    console.log(data);
    /*$('#message').css('display', 'block');
    $('#message').html(data.message);
    $('#message').addClass(data.class_name);
    $('#uploaded_image').html(data.uploaded_image);*/
   }
  });

 });

});      
    </script>
</body>
</html>