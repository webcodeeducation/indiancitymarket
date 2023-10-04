@extends('layouts.master')
@section('content')
	

<section class="mx-auto topimg">
    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4800">

      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <!--     <li data-target="#demo" data-slide-to="2"></li>
 -->
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner text-center">
        <div class="carousel-item">
          <img src="{{ URL::asset('public/assets/images/tech1.jpg') }}" class="img-fluid slider" alt="" title="">
          <div class="carousel-caption wow fadeInUp d-xl-block d-none h-75 w-75 align-items-center">
            <div class="s-title">
              <p class="text-right  text-dark display-2 w-100"></p>
            </div>
          </div>
        </div>
        <div class="carousel-item active">
        <div>
              
            <img src="{{ URL::asset('public/assets/images/tech1.jpg') }}" class="img-fluid slider" alt="" title="">
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

      <p class="btn-warning font-weight-bold btn mt-1 ml-1"><span><i class="fa fa-map-marker"></i> </span>
<select id="cars" class="btn-warning font-weight-bold btn" >
  <option value="" selected="selected">Kurukshetra</option>
  <option value="">Karnal</option>
  <option value="" >Rohtak</option>
  <option value="">Kaithal</option>
</select></p>

    </div>
    <div class="col-1 col-md-6">
      
    </div>
    <div class="col-6 col-md-3">
<form class="search form-group wow fadeInUp my-1" action="action_page.php">
      <input type="text" class="form-control ml-lg-4" placeholder="Search" name="search">
     <button type="submit" class="btn btn-lg"><i class="fa fa-search"></i></button>
  </form>
    </div>
  </div>
  </section>
  <!-- end slider -->

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="fruits.php">Fruit and veggis</a></li>
    
  </ol>
</nav>


<section class="container-fluid py-3">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 py-2  col-md-3 mx-auto text-center">
        <a href="/fruits-vegetables">
        <button class="btn btn-lg btn-primary py-3 btn-block"> Fruit and Veggis</button>
      </a>
      </div>
      <div class="col-6 py-2 col-md-3 mx-auto text-center">
        <a href="ration.php">
        <button class="btn btn-lg btn-success px-5 py-3 btn-block"> Ration</button>   
          </a>
      </div>
      <div class="col-6 py-2 col-md-3 mx-auto text-center">
        <a href="cake.php">
        <button class="btn btn-lg btn-danger px-5 py-3 btn-block"> Cake</button>    
          </a>
      </div>
    </div>
  </section>

  <section class="py-2 container-fluid" id="aboutus">
  	<div class="row">
  		<div class="col-md-2">
  			Filter here
  		</div>
  		<div class="col-md-10">
  		

<!-- Product Start -->
    @foreach($products->chunk(4) as $items)
		<div class="row course-set courses__row">
		    @foreach($items as $item)
		        <article class="col-md-3 course-block course-block-lessons">
		            <div class="thumbnail" >
               <h4 class="text-center">{{ $item->product_name }}</h4>
               <img src="{{ URL::asset('public/assets/products') }}/{{ $item->product_image }}" alt="{{ $item->product_name }}" class="img-thumbnail" />
               <div class="caption">
                  <div class="row">
                     <h3 class="text-center">
                        <label><i class="fa fa-inr"></i> Rs {{$item->product_price}}</label>
                     </h3>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <a href="cart/add/1" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add Cart</a>
                     </div>
                  </div>
                  <p> </p>
               </div>
            </div>
		        </article>
		    @endforeach
		</div>
	@endforeach
<!-- Product End -->



  		</div>

  	</div>
      </section>

       <!-- My Products  -->



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
