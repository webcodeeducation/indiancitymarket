@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Form Start-->
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
            <option value="{{$value->shopping_category_name}}">{{$value->shopping_category_name}}</option>
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
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
