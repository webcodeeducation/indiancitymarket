@extends('layouts.master')
@section('content')

<style>
/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
background-color: #00a859;
    color: white;
    padding: 3px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 0px;
    right: 228px;
    width: 223px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
	position: fixed;
    bottom: 0;
    right: 228px;
    width: 270px;
    border: 3px solid #f1f1f1;
    z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

<section class="mx-auto topimg">

		<div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4800">



			<!-- Indicators -->

			<ul class="carousel-indicators">

				<li data-target="#demo" data-slide-to="0" class="active"></li>

				<li data-target="#demo" data-slide-to="1"></li>

				<!--     <li data-target="#demo" data-slide-to="2"></li> -->

			</ul>


			<!-- The slideshow -->

			<div class="carousel-inner text-center">

				<div class="carousel-item">

					<img src="{{ URL::asset('public/assets/images/general_store.jpg') }}" class="img-fluid slider" alt="" title="">

					<div class="carousel-caption wow fadeInUp d-xl-block d-none h-75 w-75 align-items-center">

						<div class="s-title">

							<p class="text-right  text-dark display-2	w-100"></p>

						</div>

					</div>

				</div>

				<div class="carousel-item active">

				<div>

							

						<img src="{{ URL::asset('public/assets/images/general_store.jpg') }}" class="img-fluid slider" alt="" title="">

					<div class="carousel-caption wow fadeInUp d-xl-block d-none h-75 w-75 align-items-center">

						<div class="s-title">

						

						</div>

					</div>

				</div>

				</div>

			</div>

			<!-- Left and right controls -->

			<a class="carousel-control-prev" href="#demo" title="" data-slide="prev">

    <span class="carousel-control-prev-icon"></span>

  </a>

			<a class="carousel-control-next" href="#demo" data-slide="next" title="">

    <span class="carousel-control-next-icon"></span>

  </a>

		</div>

		<div class="row justify-content-around no-gutters bottom-right w-100">

	

		<div class="col-4 col-md-3">






		</div>

		<div class="col-1 col-md-6">

			

		</div>

		<!--div class="col-6 col-md-3">

<form class="search form-group wow fadeInUp my-1" action="action_page.php">

  		<input type="text" class="form-control ml-lg-4" placeholder="Search" name="search">

 		 <button type="submit" class="btn btn-lg"><i class="fa fa-search"></i></button>

	</form>

		</div-->

	</div>

	</section>

	<!-- end slider -->





<section class="container-fluid py-3">

		<div class="row justify-content-center align-items-center">
						<div class="col-6 py-2 col-md-5 col-xl-4 mx-auto text-center">

				<!--a href="/grocery">
				<img src="{{ URL::asset('public/assets/images/grocery.jpg') }}" class="img-fluid wow fadeInUp" alt="" title="">
			</a-->
			<a href="/ration-products" class="btn btn-primary btn-block btn-huge">Grocery(ration)</a>

			</div>

						<div class="col-6 py-2 col-md-5 col-xl-4 mx-auto text-center">

				<!--a href="news.php">
				<img src="{{ URL::asset('public/assets/images/news.jpg') }}" class="img-fluid wow fadeInUp" alt="" title="">
			</a-->
			<a href="/news" class="btn btn-primary btn-block btn-huge disabled">News</a>

			</div>


			<div class="col-6 col-md-5 col-xl-4 mx-auto text-center py-2">

				<!--a href="resale.php">
				<img src="{{ URL::asset('public/assets/images/resale.jpg') }}" class="img-fluid wow fadeInDown" alt="" title="">
			</a-->
			<a href="/resale" class="btn btn-primary btn-block btn-huge disabled">Resale</a>

			</div>


						<div class="col-6 py-2 col-md-5 col-xl-4 mx-auto text-center">

				<!--a href="services.php">
				<img src="{{ URL::asset('public/assets/images/services.jpg') }}" class="img-fluid wow fadeInDown" alt="" title="">
        		<button class="btn btn-sm btn-link"> Services</button>
				</a-->
				<a href="/services" class="btn btn-primary btn-block btn-huge disabled">Services</a>

			</div>

						<div class="col-6 py-2 col-md-5 col-xl-4 mx-auto text-center">

				<!--a href="/geetajyanti">
				<img src="{{ URL::asset('public/assets/images/jayanti.jpg') }}" class="img-fluid wow fadeInUp" alt="" title="">
			</a-->
			<a href="/geetajyantishops" class="btn btn-primary btn-block btn-huge disabled">Geeta Jyanti</a>

			</div>


			<div class="col-6 py-2 col-md-5 col-xl-4 mx-auto text-center" style="">

				<!--a href="shopping.php">
				<img src="{{ URL::asset('public/assets/images/shopping.jpg') }}" class="img-fluid wow fadeInUp" alt="" title="">
				</a-->
				<a href="/shopping" class="btn btn-primary btn-block btn-huge disabled">Shopping</a>

			</div>








		</div>

	</section>



<section class="py-2 container-fluid" id="aboutus">

		<article class="m-md-5 row justify-content-center align-items-center">

			<div class="col-12 col-lg-6 mx-auto text-center my-2 order-md-1 order-2">

				<a href="/offer" onclick="return false;"><img src="{{ URL::asset('public/assets/offers/icm_offer_1.png') }}" class="img-fluid wow fadeIn" alt="it web solutions" title="Great Offer" ></a>

			</div>

 			<div class="col-12 col-lg-6 bg-li my-2 order-md-2 order-1">

				<h2 class="py-4 display-3 text-center title-space wow fadeInUp">ABOUT</h2>

				<p class="px-2 px-md-4 text-justify content wow fadeIn">Stock up and Save up to 15% on monthly groceries. Buy Big Packs, Get Big Savings. Great Offers. No Cost EMI Available. Top Brands. Huge Selection. Low Prices. Easy & Fast Delivery. Best Deals. </p>

				

			</div>

			</article>

			</section>	

			@include('layouts.contact')

@endsection
