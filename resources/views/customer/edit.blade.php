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
  <title>Bhagwati Admin Panel: Subcategory</title>

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
  <button type="button" class="btn btn-info btn-md">View Products</button>



  <!-- Modal -->

  <form class="form-horizontal" action="" method="post" id="productimgform" enctype="multipart/form-data">
      <label class="control-label col-sm-2" for="category">Product Image:</label>
      <div class="col-sm-8">
        @if(isset($product[0]->prod_image))
        <img id="preview" src="{{ URL::asset('public/assets/images/products') }}/{{$product[0]->prod_image}}" width="200px" height="200px"/><br/>
        @else
        <img id="preview" src="{{URL::asset('public/assets/images/dummyproduct.jpg')}}" width="200px" height="200px"/><br/>
        @endif
        <input type="hidden" name="productid1" id="productid1" value="{{$product[0]->id}}">
        <input type="file" name="prodimage" id="image" style="display: none;"/>
        <a href="javascript:changeProfile()">Change</a> |
        <a style="color: red" href="javascript:removeImage()">Remove</a>
        
        <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload" style="margin: 4px 10px 15px;">
      </div>
      <div class="col-sm-4">
    <div class="alert alert-success showinfo" style="display:none;">
  
</div>
      </div>
      
    </form>



          <form class="form-horizontal" action="" method="post" id="producteditform" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="productid" id="productid" value="{{$product[0]->id}}">
                
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category:</label>
      <div class="col-sm-10">
        <select class="form-control" name="categoryname">
        @foreach ($category as $key => $value)
          @if($value->id == $product[0]->main_category)
            <option value="{{$value->id}}" selected="selected">{{$value->category_name}}</option>
            @else
            <option value="{{$value->id}}">{{$value->category_name}}</option>
            @endif
          @endforeach
          </select>
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="category">SubCategory:</label>
      <div class="col-sm-10">
        <select class="form-control" name="subcategoryname">
        @foreach ($subcategory as $key1 => $value1)
            @if($value1->id == $product[0]->subcategory)
            <option value="{{$value1->id}}" selected="selected">{{$value1->subcat_name}}</option>
            @else
            <option value="{{$value1->id}}">{{$value1->subcat_name}}</option>
            @endif
        @endforeach
          </select>
      </div>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="prod_type">Product Type:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_type" placeholder="Enter Product Type" name="prod_type" value="{{$product[0]->prod_type}}">
      </div>
    </div>
                <div class="form-group">
      <label class="control-label col-sm-2" for="prod_descp">Product Description:</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" name="prod_description" id="comment" value="">{{$product[0]->prod_description}}</textarea>
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_volt">Product Volt:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_volt" placeholder="Enter Product Volt" name="prod_volt" value="{{$product[0]->prod_volt}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_capacity">Product Capacity:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_capacity" placeholder="Enter Product Capacity" name="prod_capacity" value="{{$product[0]->prod_capacity}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_dim_L5">Product Dimension L5:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_dim_L5" placeholder="Enter Product Dimension L5" name="prod_dim_L5" value="{{$product[0]->prod_dim_L5}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_dim_W5">Product Dimension W5:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_dim_W5" placeholder="Enter Product Dimension W5" name="prod_dim_W5" value="{{$product[0]->prod_dim_W5}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_dim_H5">Product Dimension H5:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_dim_H5" placeholder="Enter Product Dimension H5" name="prod_dim_H5" value="{{$product[0]->prod_dim_H5}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_current_start">Product Current Start:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_current_start" placeholder="Enter Product Current Start" name="prod_current_start" value="{{$product[0]->prod_current_start}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_current_finish">Product Current Finish:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_current_finish" placeholder="Enter Product Current Finish" name="prod_current_finish" value="{{$product[0]->prod_current_finish}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_weight_dry">Product Weight Dry:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_weight_dry" placeholder="Enter Product Weight Dry" name="prod_weight_dry" value="{{$product[0]->prod_weight_dry}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_weight_filled">Product Weight Filled:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_weight_filled" placeholder="Enter Product Weight Filled" name="prod_weight_filled" value="{{$product[0]->prod_weight_filled}}">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_qty_acid">Product Quantity Acid:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_qty_acid" placeholder="Enter Product Quantity Acid" name="prod_qty_acid" value="{{$product[0]->prod_qty_acid}}">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" class="btn btn-primary btnSaveEditProduct">Submit</button>
      </div>
    </div>
  </form>

<!--Start Datatable and form -->

<!-- tile body -->
                            
                                <!-- /tile body -->
<!--Start Datatable and form -->
    </div>




   

  </div>


</section>    

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    function changeProfile() {
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