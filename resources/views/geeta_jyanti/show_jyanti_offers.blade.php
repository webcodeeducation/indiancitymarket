<?php
/*print_r($categories);
die();*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	@include('../partials.head')
<style>
.center_img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>	
</head>
<body class="skin-default">
<div id="wrapper">
	
<div class="header">
@if(session()->has('user_id'))
      @include('partials.loggedinclude')
@else 
    @include('partials.header')
@endif		
</div>

        <div>

            <div class="main-container" id="homepage">
                           
       <div class="wide-intro" style="height: 505px !important; background-image: url('{{ URL::asset('public/assets/images/geeta_1.jpg') }}');">
		<div class="dtable hw100" style="height: 435px !important;">
			<div class="dtable-cell hw100">
				<div class="container text-center">
					
					<h1 class="intro-title animated fadeInDown">START WITH Indiancitymarket </h1>
						<p class="sub animateme fittext3 animated fadeIn">
							Geeta Jyanti
						</p>									
				</div>
			</div>
		</div>
	</div>

	
	<div class="h-spacer"></div>
	<div class="container">
		<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<a href="/Jyanti/Map"><button type="button" class="btn btn-primary">Map</button></a>
				<a href="/offers"><button type="button" class="btn btn-primary">Offers</button></a>
		</div>
		</div>
		</div>
	</div>


		<div class="h-spacer"></div>
	<div class="container">
		<div class="row">
		<div class="col-md-10">
			<form action="/searchshop" method="get" class="form-inline" role="form">
   <div class="form-group">
   	{{csrf_field()}}
      <label for="name">Shop Number</label>
	  <input type="text" class="form-control" name="search" id="search" placeholder="Shop Number, Name, Product" value="">
   </div>
   <button type="submit" class="btn btn-primary">Search</button>
</form>
		</div>
		</div>
	</div>


	
	<!-- Show Product Section Start -->
	<div class="h-spacer"></div>
		<div class="container">
		<div class="row content-box layout-section">
			<div class="col-md-10">
					<h2>Geeta Jyanti Programs</h2>
  <p>Please find below to geeta jyanti programs schedlues:</p>
  <img src="{{ URL::asset('public/assets/geeta_jyanti/programs_1.jpg') }}" alt="Geeta Jyanti Programs" class="center_img img-thumbnail" style="">
			</div>
		</div>
	</div>
	<!-- Show Product Section End -->


  <div class="h-spacer"></div>
    <div class="container">
    <div class="col-xl-12 content-box layout-section">
      <div class="row row-featured row-featured-category">
        
        <div class="col-xl-12 box-title no-border">
          <div class="inner">
            <h2>
              <span class="title-3">Jyanti <span style="font-weight: bold;">Offers</span></span>
                            <a href="/search" class="sell-your-item">
                View more <i class="fa fa-list"></i>
              </a>
            </h2>
          </div>
        </div>
        
        <div id="postsList" class="adds-wrapper noSideBar category-list">
                    
                

            @foreach($shops as $key99=>$value99)
            <div class="item-list">
                        
            <div class="row">
              <div class="col-sm-2 no-padding photobox">
                <div class="add-image">
                  <!-- <a href="/jyantiads/{{$value99->id}}"> -->
                    <a href="/GeetaJyanti/shop/{{$value99->id}}">
                    <img class="lazyload img-thumbnail no-margin" src="{{ URL::asset('public/assets/geeta_jyanti/ads') }}/{{$value99->shop_image}}" alt="{{$value99->shop_number}}">
                  </a>
                </div>
              </div>
              <div class="col-sm-7 add-desc-box">
                <div class="items-details">
                  <h5 class="add-title">
                    <!-- <a href="/jyantiads/{{$value99->id}}">{{$value99->shop_number}}</a> -->
                    <a href="/GeetaJyanti/shop/{{$value99->id}}">Shop Number: {{$value99->shop_number}}</a>
                  </h5>
                  <h6>Shop Type: {{$value99->shop_category}}</h6>
                  <h6>Offer: {{$value99->offer_discount}} Discount</h6>
                </div>            
              </div>
            </div>
          </div>
          @endforeach


      
          <div style="clear: both"></div>
          
                      <div class="mb20 text-center">
              <button class="btn btn-default mt10"><i class="fa fa-arrow-circle-right"></i> View More</button>
            </div>
                  </div>
        
      </div>
    </div>
  </div>




      

	
                                                                                    
         </div>
                        
			
			@include('partials.footer')
	
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ URL::asset('public/assets/js/app.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/en.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/load.cities.js' )}}"></script>
<script src="{{ URL::asset('public/assets/js/jquery.twism.js' )}}"></script>

<script>
         function getMessage() {
            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>
							
</body>
</html>