<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Product Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){


$('body').on('change','.product_categorie', function (e) {
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    $.post('/getsubcat', {'_token':csrf_token, 'id':valueSelected}, function(data){
    	//console.log(data);
    	$('.subcatdiv_option').html(data);
    	$('.product_subcatdiv').show('fast');
    });
	});

	/*$('input[type="file"]').change(function(e){ 
	    //$("h4").text("File is added!");
	    var fileName = $(this).val();
       	$(".filename").html(fileName);
	    console.log('File is added:' + fileName);

	    var formData = new FormData(this);

	    $.ajax({
                type:'POST',
                url: "{{ url('save-photo')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    alert('Image has been uploaded successfully');
                },
                error: function(data){
                    console.log(data);
                }
            });

	});*/ 


});
</script>
</head>
<body>

<div class="container">
  <form action="/submitproductnew" method="post" class="form-horizontal" enctype="multipart/form-data">
  	{{csrf_field()}}
<fieldset>

<!-- Form Name -->
<legend>PRODUCT</legend>
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_id">PRODUCT SKU</label>  
  <div class="col-md-4">
  <input id="product_sku" name="product_sku" placeholder="PRODUCT SKU" class="form-control input-md" type="text" value="">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
  <div class="col-md-4">
    <select id="product_categorie" name="product_category" class="form-control product_categorie" required="required">
    	<option value="0">Select Category</option>
    	@foreach($categories as $key=>$value)
    		<option value="{{$value->id}}">{{$value->shopping_category_name}}</option>
    	@endforeach	
    </select>
  </div>
  <div class="col-md-4 product_subcatdiv" style="display:none;">
  	<div class="subcatdiv_option"></div>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Product Image</label>
  <div class="col-md-4">
    <input id="filebutton" name="image" class="input-file" type="file" required="required">
    <span class="filename">Nothing selected</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="required" type="text" value="">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">Product Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="product_description" name="product_description"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percentage_discount">Product Price</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="product_price" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="required" type="text" value="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percentage_discount">PERCENTAGE DISCOUNT</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="percentage_discount" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="required" type="text" value="">
    
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Save</label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
  </div>
  </div>

</fieldset>
</form>

</div>

</body>
</html>
