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
							Saras Mela
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
	  <input type="text" class="form-control" name="search" id="search" placeholder="Stall Number & Product" value="">
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
					<h2>Geeta Jayanti Programs</h2>
  <p>Please find below to geeta jyanti programs schedlues:</p>
  <img src="{{ URL::asset('public/assets/geeta_jyanti/programs_1.jpg') }}" alt="Geeta Jyanti Programs" class="center_img img-thumbnail" style="">
  <img src="{{ URL::asset('public/assets/geeta_jyanti/programs_below.jpg') }}" alt="Geeta Jyanti Programs" class="center_img img-thumbnail" style="60%">
  <!--table class="table table-hover">
    <thead>
      <tr>
        <th>Date</th>
        <th>Programe Name</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
      <tr>
        <td>Date Here</td>
        <td>Program Name</td>
        <td>Date Here</td>
      </tr>
    </tbody>
  </table-->
			</div>
		</div>
	</div>
	<!-- Show Product Section End -->




      

	
                                                                                    
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