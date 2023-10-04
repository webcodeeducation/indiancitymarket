<!DOCTYPE html>
<html lang="en">
<head>
  <title>Indiancitymarket: Post Your Product to Resale</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
.Product_Button
{
    padding:20px;
    border:1px solid #fff;
}
.margin50{
    margin-top:50px
}
.productbtn:after {
    font-family: "Glyphicons Halflings";
    content: "\e114";
    float: right;
    margin-left: 15px;
  }
  /* Icon when the collapsible content is hidden */
  .productbtn.collapsed:after {
    content: "\e080";
  }
  .width450
  {
      width:450px
  }
  .margin50 {
    margin-top:50px;   
}
input[type=radio], input[type=checkbox]
{
    margin:4px !important;
}
.dimentions-width, .dimentions-height
{
    width:90%;
    display:initial;
}
  </style>
</head>
<body>

<div class="container">

<!--div>
    <div class="Product_Button col-lg-offset-6">
        <a href="#" class="btn btn-primary"><i class=""></i><strong>MANAGE VARIANTS</strong></a>
        <a href="#" class="btn btn-primary"><i class=""></i><strong>CLOSE</strong></a>
        <a href="#" class="btn btn-primary"><i class=""></i><strong>SAVE AND CLOSE</strong></a>
        <a href="#" class="btn btn-primary"><i class=""></i><strong>SAVE</strong></a>
    </div>
</div-->
<div class="clearfix"></div>
	<div class="row">

		<form class="form-horizontal" action='/submitresaleproduct' method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
		<div><ul class="nav nav-tabs col-lg-12" role="tablist">
            <li class="active"><a href="#Product_main" role="tab" data-toggle="tab">Main</a></li>
            <li class=""><a href="#Product_Images" role="tab" data-toggle="tab">Images</a></li>
            <li class=""><a href="#Product_Summary"  role="tab" data-toggle="tab">Summary</a></li>
            <li class=""><a href="#Product_Options" role="tab" data-toggle="tab">Options</a></li>
        </ul></div> 
        <div class="clearfix"></div>
        <div class="Product_Content tab-content">
            <div id="Product_main" class="tab-pane active">
            
  <fieldset>
    <div class="col-lg-12 form-group margin50">

      <label class="col-lg-2"  for="Name">Product Title</label>
      <div class="col-lg-4">
        <input type="text" id="name" name="name" placeholder="" class="form-control name">
      </div>
    </div>
 
    <div class=" col-lg-12 form-group">
      <label class="col-lg-2" for="ProductType">Product Category</label>
      <div class="col-lg-4">
        <select id="productType" name="category" class="form-control product-type">
        	<option value="0">-Select-</option>
        	@foreach($categories as $key=>$value)
            <option value="{{$value->id}}">{{$value->resale_category_name}}</option>
            @endforeach
        </select>
      </div>
    </div>
     <div class="col-lg-12 form-group">
      <label class="col-lg-2" for="Manufacturer">Manufacturer</label>
      <div class="col-lg-4">
        <input type="text" id="manufacturer" name="manufacturer" placeholder="" class="form-control name">
      </div>
    </div>
    
    
 
    <div class="col-lg-12 form-group">
      <label class="col-lg-2" for="SKU">SKU</label>
      <div class="col-lg-4">
        <input type="text" id="SKU" name="SKU" placeholder="" class="form-control sku">
      </div>
    </div>
 
    <div class="col-lg-12 form-group">
      <label class="col-lg-2"  for="ManufacturerPart">Product Price</label>
      <div class="col-lg-4">
        <input type="text" id="price" name="price" placeholder="" class="form-control manufacturer-part">
      </div>
    </div>
    <div class="col-lg-12 form-group">
      <label class="col-lg-2"  for="ManufacturerPart">Product Offers</label>
      <div class="col-lg-4">
        <input type="text" id="offers" name="offers" placeholder="" class="form-control manufacturer-part">
      </div>
    </div>
        <div class="col-lg-12 form-group">
      <label class="col-lg-2"  for="ManufacturerPart">Product Colors</label>
      <div class="col-lg-4">
        <input type="text" id="colors" name="colors" placeholder="" class="form-control manufacturer-part">
      </div>
    </div>
        <div class="col-lg-12 form-group">
      <label class="col-lg-2"  for="ManufacturerPart">Product Size</label>
      <div class="col-lg-4">
        <input type="text" id="size" name="size" placeholder="" class="form-control manufacturer-part">
      </div>
    </div>
        <div class="col-lg-12 form-group">
      <label class="col-lg-2"  for="ManufacturerPart">Product Seller</label>
      <div class="col-lg-4">
        <input type="text" id="seller" name="seller" placeholder="" class="form-control manufacturer-part">
      </div>
    </div>
    <div class="col-lg-12 form-group">
      <label class="col-lg-2"  for="Published">Published</label>
      <div class="col-lg-4">
        <input type="radio"  name="Published" class="input-xlarge" value="0"><span>No</span>
         <input type="radio"  name="Published" checked class="input-xlarge" value="1"><span>Yes</span>
      </div>
    </div>
    <div class="col-lg-12 form-group">
      <label class="col-lg-2"  for="Featured">Featured</label>
      <div class="col-lg-4">
        <input type="radio"  name="Featured" class="input-xlarge" value="0"><span>No</span>
         <input type="radio"  name="Featured" checked class="input-xlarge" value="1"><span>Yes</span>
      </div>
    </div>

  </fieldset>

            </div>            
            <div id="Product_Images" class="tab-pane">
              <div class="col-lg-12 form-group">
                <label class="col-sm-2" for="exampleInputFile">Small</label>
                <div class="col-sm-4">
                <input type="file" id="small" name="small">
              </div>
              </div>
              
              <div class="col-lg-12 form-group">
                <label class="col-sm-2" for="exampleInputFile">Medium</label>
                <div class="col-sm-4">
                <input type="file" id="medium" name="medium">
              </div>
              </div>
              
              <div class="col-lg-12 form-group">
                <label class="col-sm-2" for="exampleInputFile">Large</label>
                <div class="col-sm-4">
                <input type="file" id="large" name="large">
              </div>
              </div>
              
              
    </div>
            <div id="Product_Summary" class="tab-pane">
    <div class="col-lg-12 form-group margin50">
    <label class="col-sm-2" for="Summary">Summary</label>
    <div class="col-sm-4">
     <textarea class="form-control summary" id="summary" name="summary" rows="10" cols="30"></textarea>
    </div>
  </div></div>

            
            <div id="Product_Options" class="tab-pane">  <div class="col-lg-12 form-group margin50">
<div class="col-lg-6">
    <label class="col-sm-4" for="RelatedProducts">Related Products</label>
    <div class="col-sm-8">
      <input class="form-control related-products" type="text" id="relatedProducts" name="relatedProducts" >
    </div>
  </div>
  <div class="col-lg-4">
       <div class="container">
  <button type="button" class="btn productbtn collapsed width450" data-toggle="collapse" data-target="#related">Related Products Helper</button>
  <div id="related" class="collapse">
    Related Products Information
  </div>
</div>
  </div>
  </div>
  <div class="col-lg-12 form-group">
  <div class="col-lg-6">
    <label class="col-sm-4" for="UpsellProducts">Upsell Products</label>
    <div class="col-sm-8">
      <input class="form-control upsell-products" type="text" id="upsellProducts" name="upsellProducts">
    </div>
  </div>
  <div class="col-lg-4">
       <div class="container">
  <button type="button" class="btn productbtn collapsed width450" data-toggle="collapse" data-target="#upsell">Upsell Products Helper</button>
  <div id="upsell" class="collapse">
    Upsell Products Information
  </div>
  </div>
   </div>
  </div>
  <div class="col-lg-12 form-group">
  <div class="col-lg-6">
    <label class="col-sm-4" for="RequiredProducts">Required Products</label>
    <div class="col-sm-8">
      <input class="form-control required-products" type="text" id="requiredProducts" name="requiredProducts">
    </div>
  </div>
  <div class="col-lg-4">
       <div class="container">
  <button type="button" class="btn productbtn collapsed width450" data-toggle="collapse" data-target="#required">Required Products Helper</button>
  <div id="required" class="collapse">
   Required Products Information
  </div>
  </div>
   </div>
  </div>
  <div class="col-lg-12 form-group">
  <div class="col-lg-6">
    <label class="col-sm-4" for="UpsellProductDiscount">Upsell Product Discount Percent</label>
    <div class="col-sm-8">
      <input class="form-control upsell-product-discount" type="text" id="upsellProductDiscount" name="upsellProductDiscount">
    </div>
  </div>
  </div>
</div>

        </div>

        <div class="col-lg-6 col-sm-6 col-md-6">
<input type="submit" name="submit" class="btn btn-primary" value="Submit">
<div class="flash-message">
                      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        @endif
                      @endforeach
                    </div>
        </div>

        </form>
	</div>
<div>
    <!--div class="Product_Button col-lg-offset-6">
        <a href="#" class="btn btn-primary"><i class=""></i><strong>MANAGE VARIANTS</strong></a>
        <a href="#" class="btn btn-primary"><i class=""></i><strong>CLOSE</strong></a>
        <a href="#" class="btn btn-primary"><i class=""></i><strong>SAVE AND CLOSE</strong></a>
        <a href="#" class="btn btn-primary"><i class=""></i><strong>SAVE</strong></a>
    </div-->
</div>
</div>

</body>
</html>
