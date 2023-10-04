
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

@include('shop.partials.header')

<section class="content">

  <div class="row">

    <div class="col-md-10 col-sm-10 col-xs-12">
      
      <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add Product</button>
<div class="alert alert-success showinfo" style="display:none;">
  
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SubCategory</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="" method="post" id="productform" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="form-group">
      <label class="control-label col-sm-2" for="category">Product Image:</label>
      <div class="col-sm-10">
        <img id="preview" src="{{ URL::asset('public/assets/images/dummyproduct.jpg') }}" width="200px" height="200px"/><br/>
    <input type="file" name="prodimage" id="image" style="display: none;"/>
    <a href="javascript:changeProfile()">Change</a> |
    <a style="color: red" href="javascript:removeImage()">Remove</a>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category Name:</label>
      <div class="col-sm-10">
        <div id="category_response_here"></div>
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="category">SubCategory Name:</label>
      <div class="col-sm-10">
        <div id="subcategory_response_here"></div>
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="prod_descp">Product Description:</label>
      <div class="col-sm-10">
        <!--input type="text" class="form-control" id="prod_description" placeholder="Enter Product Description" name="prod_description" value=""-->
        <textarea class="form-control" name="prod_description" rows="5" id="prod_description" value=""></textarea>
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_type">Product Type:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_type" placeholder="Enter Product Type" name="prod_type" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_volt">Product Volt:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_volt" placeholder="Enter Product Volt" name="prod_volt" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_capacity">Product Capacity:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_capacity" placeholder="Enter Product Capacity" name="prod_capacity" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_dim_L5">Product Dimension L5:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_dim_L5" placeholder="Enter Product Dimension L5" name="prod_dim_L5" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_dim_W5">Product Dimension W5:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_dim_W5" placeholder="Enter Product Dimension W5" name="prod_dim_W5" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_dim_H5">Product Dimension H5:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_dim_H5" placeholder="Enter Product Dimension H5" name="prod_dim_H5" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_current_start">Product Current Start:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_current_start" placeholder="Enter Product Current Start" name="prod_current_start" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_current_finish">Product Current Finish:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_current_finish" placeholder="Enter Product Current Finish" name="prod_current_finish" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_weight_dry">Product Weight Dry:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_weight_dry" placeholder="Enter Product Weight Dry" name="prod_weight_dry" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_weight_filled">Product Weight Filled:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_weight_filled" placeholder="Enter Product Weight Filled" name="prod_weight_filled" value="">
      </div>
    </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="prod_qty_acid">Product Quantity Acid:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_qty_acid" placeholder="Enter Product Quantity Acid" name="prod_qty_acid" value="">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" class="btn btn-primary btnSaveProduct">Submit</button>
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


                            <table class="table table-bordered ajaxTable tblproducts" id="tblproducts" width="100%" cellspacing="0">
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
                                  <th>Current Finish</th>
                                  <th>Weight Dry</th>
                                  <th>Weight Filled</th>
                                  <th>Acid</th>
                                  <th>Active</th>
                                  <th>Action</th>
                                  <th>Action</th>
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
                                  <th>Current Finish</th>
                                  <th>Weight Dry</th>
                                  <th>Weight Filled</th>
                                  <th>Acid</th>
                                  <th>Active</th>
                                  <th>Action</th>
                                  <th>Action</th>
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
    </script>
</body>
</html>