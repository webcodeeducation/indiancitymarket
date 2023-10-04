@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12" id="content">
                  <div class="row">
                <div class="col-md-8">
                    <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                      @endif
                    @endforeach
                  </div>
                    <!-- Form Start-->
                    <form class="form-horizontal" action="/submitproductnew" method="post" id="productform" enctype="multipart/form-data">
                    {{csrf_field()}}
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category:</label>
      <div class="col-sm-10">
        <select id="product_category" name="product_category" class="form-control product_categorie" required="required">
        <option value="0">Select Category</option>
        @foreach($categories as $key=>$value)
            <option value="{{$value->id}}">{{$value->shopping_category_name}}</option>
        @endforeach 
    </select>
      </div>
    </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="category">SubCategory:</label>
      <div class="col-sm-10">
        <select id="subcategory_fill" name="product_subcategory" class="form-control product_categorie" required="required">
    </select>
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
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="required" type="text" value="{{old('product_name')}}">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT WEIGHT</label>  
  <div class="col-md-4">
  <input id="product_wight" name="product_weight" placeholder="PRODUCT WEIGHT" class="form-control input-md" required="required" type="text" value="{{old('product_wight')}}">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">Product Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="product_description" name="product_description">{{old('product_description')}}</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percentage_discount">Product Price</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="product_price" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="required" type="text" value="{{old('percentage_discount')}}">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percentage_discount">Product MRP</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="product_mrp" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="required" type="text" value="{{old('product_mrp')}}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_save_price">MRP Save</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="product_save_price" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="required" type="text" value="{{old('product_save_price')}}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percentage_discount">PERCENTAGE DISCOUNT</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="percentage_discount" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="required" type="text" value="{{old('percentage_discount')}}">
    
  </div>
</div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btnSaveProduct1">Submit</button>
      </div>
    </div>
  </form>
                    <!-- Form End -->



                </div>
            </div>
                </div>
                </div>
    
                </div>
            </div>
            <!--row -->

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection