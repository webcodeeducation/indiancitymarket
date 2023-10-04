@extends('layouts.master')
@section('content')
	

<div class="container-fluid no-gutters px-0 topimg">
	<img src="{{ URL::asset('public/assets/images/tech1.jpg') }}" class="img-fluid wow fadeIn">
	<div class="row justify-content-center no-gutters bottom-right">
	<form class="search form-group wow fadeInUp my-1" \>
  		<input type="text" class="form-control" placeholder="Search City" name="search"/>
 		 <a href="city.php" type="submit" class="btn btn-lg"><i class="fa fa-search"></i></a>
	</form>
		
	</div>

</div>

<section class="container-fluid py-3">
		<div class="row justify-content-center align-items-center">
			<div class="col-6 py-2 col-md-5 col-xl-3 mx-auto text-center">
				<a href="services.php">
				<img src="{{ URL::asset('public/assets/images/services.jpg') }}" class="img-fluid wow fadeInDown" alt="" title="">
				</a>
			</div>
			<div class="col-6 py-2 col-md-5 col-xl-3 mx-auto text-center">
				<a href="shopping.php">
				<img src="{{ URL::asset('public/assets/images/shopping.jpg') }}" class="img-fluid wow fadeInUp" alt="" title="">
			</a>
			</div>
			<div class="col-6 col-md-5 col-xl-3 mx-auto text-center py-2">
				<a href="resale.php">
				<img src="{{ URL::asset('public/assets/images/resale.jpg') }}" class="img-fluid wow fadeInDown" alt="" title="">
			</a>
			</div>
			<div class="col-6 py-2 col-md-5 col-xl-3 mx-auto text-center">
				<a href="news.php">
				<img src="{{ URL::asset('public/assets/images/news.jpg') }}" class="img-fluid wow fadeInUp" alt="" title="">
			</a>
			</div>
		</div>
	</section>

<section class="py-2 container-fluid" id="aboutus">
		<article class="m-md-5 row justify-content-center align-items-center">
			<div class="col-12 col-lg-6 mx-auto text-center my-2 order-md-1 order-2">
				<img src="{{ URL::asset('public/assets/images/450x300.jpg') }}" class="img-fluid wow fadeIn" alt="it web solutions" title="Latest web solutions">
			</div>
 			<div class="col-12 col-lg-6 bg-li my-2 order-md-2 order-1">
				<h2 class="py-4 display-3 text-center title-space wow fadeInUp">ABOUT</h2>
				<p class="px-2 px-md-4 text-justify content wow fadeIn">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>
				
			</div>
			</article>
			</section>	


			<section class="container-fluid bg-warning1 py-4" id="contactus">
		<div class="container py-5">
			<h3 class="text-dark text-left py-3 display-4 wow fadeInLeft">CONTACT US</h3>
			<div class="row justify-content-center no-gutters py-3">
				<div class="col-12 col-md-6 pt-3 wow fadeInUp">
					<form class="form-group">
						<div class="row justify-content-start">
							<div class="col-12 col-md-6 py-2">
								<div class="input-group input-group-lg">
									<div class="input-group-prepend">
										<span class="input-group-text bg-light" id="inputGroup-sizing-lg"><i class="fa fa-user" aria-hidden="true"></i>
										</span>
									</div>
									<input type="text" class="form-control" aria-label="Sizing example input" placeholder="Name" aria-describedby="inputGroup-sizing-lg">
								</div>
							</div>
							<div class="col-12 col-md-6 py-2">
								<div class="input-group input-group-lg">
									<div class="input-group-prepend">
										<span class="input-group-text bg-light" id="inputGroup-sizing-lg"><i class="fa fa-envelope" aria-hidden="true"></i>
										</span>
									</div>
									<input type="Email" placeholder="Email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
								</div>
							</div>
							<div class="col-12 col-md-6 py-2">
								<div class="input-group input-group-lg">
									<div class="input-group-prepend">
										<span class="input-group-text bg-light" id="inputGroup-sizing-lg"><i class="fa fa-phone" aria-hidden="true"></i>
										</span>
									</div>
									<input type="numbers" placeholder="Phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
								</div>
							</div>
							<div class="col-12 col-md-6 py-2">
								<div class="input-group input-group-lg">
									<div class="input-group-prepend">
										<span class="input-group-text bg-light" id="inputGroup-sizing-lg"><i class="fa fa-map-marker mx-1" aria-hidden="true"></i>
										</span>
									</div>
									<input type="text" placeholder="Location" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
								</div>
							</div>
							<div class="col-12 py-2">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-light"><i class="fa fa-list align-self-start mx-1" aria-hidden="true"></i>
										</span>
									</div>
									<textarea class="form-control" placeholder="Requirement" rows="4" aria-label="With textarea"></textarea>
								</div>
							</div>
							<div class="py-2 text-right ml-auto mr-3">
								<a href="#contactus" class="btn btn-con btn-outline-dark px-5 py-3 text-right ml-auto content2" onclick="showDiv()" title="contact best web designers" >SUBMIT</a>
							</div>
							<div>
								<div id="welcomeDiv" class="alert alert-warning alert-dismissible text-center fade show" style="display:none;">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Great !! &nbsp; </strong>Thank you for contacting us we will get back to you soon.
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-1 d-none d-md-block boright">
				</div>
				<div class="col-12 col-md-5 text-dark pl-5 py-2 mt-2">
					<span><i class="fa fa-phone display-3 float-left mr-3 wow fadeInUp" aria-hidden="true"></i>
						</span>
					<p class="pl-3 content2 wow fadeInLeft">Phone/WhatsApp<br>
						<span class="display-4">+91 123456789</span></p>
					<br>
					<br>
					<span><i class="fa fa-envelope-o display-3 float-left mr-3 wow fadeInUp" aria-hidden="true"></i>
						</span>
					<p class="pl-3 content2 wow fadeInLeft">Email us<br>
						<span class="display-4">mail@xyz.com</span></p>
					<br>
					<br>
					<p class="content2  wow fadeInLeft">Follow us on:</p>
					<ul class="footer-list list-icon text-dark wow flipInX">
						<li class="inlie-list-item"><a href=""><i class="fa fa-facebook-official" title="ios app development in haryana"></i></a></li>
						<li class="inlie-list-item"><a href=""><i class="fa fa-twitter-square" title="seo solutions in kkr"></i></a></li>
						<li class="inlie-list-item"><a href=""><i class="fa fa-linkedin-square" title="best app development"></i></a></li>
						<li class="inlie-list-item"><a href=""><i class="fa fa-instagram" title="content writing services in kkr"></i></a></li>
						<li class="inlie-list-item"><a href=""><i class="fa fa-google-plus-square" title="best banner designing in kkr"></i></a></li>
						<li class="inlie-list-item"><a href=""><i class="fa fa-pinterest-square" title="best android app development in kkr"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>


@endsection