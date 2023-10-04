@extends('layouts.app')
@section('content')
<div class="brand clearfix">
    <a href="/admin" style="font-size: 20px;">Indiancitymarket</a>  
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">

            <li class="ts-account">
                <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
                <ul>
                    <li><a href="/change-password">Change Password</a></li>
                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="ts-main-content">
    @include('layouts.shop_navigation')
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h3 class="page-title">Add Product</h3>

                        <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<!-- <legend>PRODUCTS</legend> -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name_fr">PRODUCT DESCRIPTION FR</label>  
  <div class="col-md-4">
  <input id="product_name_fr" name="product_name_fr" placeholder="PRODUCT DESCRIPTION FR" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
  <div class="col-md-4">
    <select id="product_categorie" name="product_categorie" class="form-control">
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="available_quantity">AVAILABLE QUANTITY</label>  
  <div class="col-md-4">
  <input id="available_quantity" name="available_quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_weight">PRODUCT WEIGHT</label>  
  <div class="col-md-4">
  <input id="product_weight" name="product_weight" placeholder="PRODUCT WEIGHT" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="product_description" name="product_description"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name_fr">PRODUCT DESCRIPTION FR</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="product_name_fr" name="product_name_fr"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="percentage_discount">PERCENTAGE DISCOUNT</label>  
  <div class="col-md-4">
  <input id="percentage_discount" name="percentage_discount" placeholder="PERCENTAGE DISCOUNT" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="stock_alert">STOCK ALERT</label>  
  <div class="col-md-4">
  <input id="stock_alert" name="stock_alert" placeholder="STOCK ALERT" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="stock_critical">STOCK CRITICAL</label>
  <div class="col-md-4">
    <input id="stock_critical" name="stock_critical" placeholder="STOCK CRITICAL" class="form-control input-md" required="" type="search">
    
  </div>
</div>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tutorial">TUTORIAL</label>
  <div class="col-md-4">
    <input id="tutorial" name="tutorial" placeholder="TUTORIAL" class="form-control input-md" required="" type="search">
    
  </div>
</div>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tutorial_fr">TUTORIAL FR</label>
  <div class="col-md-4">
    <input id="tutorial_fr" name="tutorial_fr" placeholder="TUTORIAL FR" class="form-control input-md" required="" type="search">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="online_date">ONLINE DATE</label>  
  <div class="col-md-4">
  <input id="online_date" name="online_date" placeholder="ONLINE DATE" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="author">AUTHOR</label>  
  <div class="col-md-4">
  <input id="author" name="author" placeholder="AUTHOR" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="enable_display">ENABLE DISPLAY</label>  
  <div class="col-md-4">
  <input id="enable_display" name="enable_display" placeholder="ENABLE DISPLAY" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="comment">COMMENT</label>  
  <div class="col-md-4">
  <input id="comment" name="comment" placeholder="COMMENT" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="approuved_by">APPROUVED BY</label>  
  <div class="col-md-4">
  <input id="approuved_by" name="approuved_by" placeholder="APPROUVED BY" class="form-control input-md" required="" type="text">
    
 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">main_image</label>
  <div class="col-md-4">
    <input id="filebutton" name="filebutton" class="input-file" type="file">
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
  </div>
  </div>

</fieldset>
</form>
                    </div>
                </div>













            </div>
        </div>
    </div>
@endsection
