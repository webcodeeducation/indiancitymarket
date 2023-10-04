@extends('layouts.master')
@section('content')
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
<div class="container gallery-container">

    <h1>Geeta Jyanti Shops</h1>
   
    <div class="tz-gallery">

        <div class="row">
          @foreach($shops as $key=>$value)
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="/GeetaJyanti/shop/{{$value->id}}">
                	@if(!empty($value->shop_image))
                    <img src="{{ URL::asset('public/assets/geeta_jyanti/shops/') }}/{{$value->shop_image}}" alt="Shop Image" style="margin:10px;width:250px">
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
        	<div class="col-md-2">
        		<div class="custom-pagination">
                <!--span>1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <span class="more-page">...</span>
                <a href="#">10</a-->
                  {{ $shops->links() }}
              </div>
        	</div>
        </div>

    </div>

</div>
	<!-- Show Product Section End -->




      

	
                                                                                    
         </div>
                        
@endsection