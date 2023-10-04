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
                    <form class="form-horizontal" action="/updateproduct" method="post" id="productform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="productid" value="{{$product->id}}">
                <!--div class="form-group">
      <label class="control-label col-sm-2" for="category">Product Image:</label>
      <div class="col-sm-10">
        <img id="preview" src="{{ URL::asset('public/assets/images/dummy.jpg') }}" width="200px" height="200px"/><br/>
      </div>
    </div-->
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category:</label>
      <div class="col-sm-10">
        <select id="product_categorie" name="product_category" class="form-control product_categorie" required="required">
        <option value="0">Select Category</option>
        @foreach($categories as $key=>$value)
            <option value="{{$value->shopping_category_name}}">{{$value->shopping_category_name}}</option>
        @endforeach 
    </select>
      </div>
    </div>

       <!-- File Button --> 
<!--div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Product Image</label>
  <div class="col-md-4">
    <input id="filebutton" name="image" class="input-file" type="file" required="required">
    <span class="filename">Nothing selected</span>
  </div>
</div-->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="required" type="text" value="{{$product->product_name}}">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT WEIGHT</label>  
  <div class="col-md-4">
  <input id="product_wight" name="product_weight" placeholder="PRODUCT WEIGHT" class="form-control input-md" required="required" type="text" value="{{$product->product_weight}}">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">Product Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="product_description" name="product_description">{{$product->product_details}}</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percentage_discount">Product Price</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="product_price" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="required" type="text" value="{{$product->product_price}}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percentage_discount">PERCENTAGE DISCOUNT</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="percentage_discount" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" type="text" value="{{$product->product_details}}">
    
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