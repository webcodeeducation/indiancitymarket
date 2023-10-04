@extends('layouts.master')
@section('content')

<style>

section#filter {

    margin-left: 60px;

}
  ::-webkit-scrollbar {
    width: 0px;
    background: transparent;
}
.outer-container{
  width: 100vw;
  max-width: 100%;
  margin-left: auto;
  margin-right: auto;
  -webkit-transition: width 1s;
  -o-transition: width 1s;
  transition: width 1s;
}
/*#change-button {
  background: #a4cb61;
  color: #fff;
  position: fixed;
  bottom: 20px;
  right: 20px;
  margin-left: auto;
  margin-right: auto;
  letter-spacing: 2px;
  border: 0px;
  border-radius: 20px;
  padding: 10px 20px;
  cursor: pointer;
}
#change-button:hover {
  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
}*/
.outer-container.active {
  width: 500px !important;
  -webkit-transition: width 1s;
  -o-transition: width 1s;
  transition: width 1s;
}
.tour-details-section {
  height: 100vh;
}
.center {
  height: 100vh;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.center p {
  font-size: 20px;
  font-weight: 600;
  text-align: center;
}

/*#itinerary,
#dates,
#map,
#book {
  background: #c4da9e;
}
#accommodation,
#includes-excludes,
#gallery {
  background: #e4e4e4;
}*/


/* Sticky nav */ 
#eight-day-sticky-section .tour-details-section-active {
  color: #a4cb61 !important;
  background: transparent !important;
}


.sticky-section {
  z-index: 19 !important;
}

.scrollmenu-fade {
  position: relative;
}
.scrollmenu-fade:after {
  content: "";
  position: absolute;
  z-index: 1;
  top: 0;
  right: 0;
  bottom: 15px;
  pointer-events: none;
  background-image: linear-gradient(to right,rgba(255,255,255,0),#333333 85%);
  width: 15%;
  height: 46px;
    }

div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
  text-align: center;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu p {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}
/* Media queries */

@media only screen and (min-width : 650px) {
  div.scrollmenu p.scroll-display-arrow {
    display: none;
}
}

@media only screen and (max-width : 650px) {
  .scrollmenu-fade:after {
    height: 82px !important;
}
  #change-button {
    display: none;
}
  .hide-mobile {
    display: none;
}
}
</style>	
<script>
jQuery(function ($) {
    $(document).ready(function() {
        function becomeSticky(el, padding) {
            if (el.length) {
                el.sticky({
                    topSpacing: padding
                });
            }
        }
        becomeSticky($("#eight-day-sticky-section"), 0);
    });
});

jQuery(function ($) {
    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        $('.tour-details-section').each(function (i) {
            var topPos = $(this).offset().top;
            if ((topPos - scrollPos) <= 80) {
                $('.tour-details-section-active').removeClass('tour-details-section-active')
                $('#eight-day-sticky-section .active-highlight').eq(i).addClass('tour-details-section-active')
            }
        })
    });
});

$("#change-button").click(function() {
  $(".outer-container").toggleClass( "active" );
});
</script>


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

          <img src="{{ URL::asset('public/assets/images/ration_store.jpg') }}" class="img-fluid slider" alt="" title="">

          <div class="carousel-caption wow fadeInUp d-xl-block d-none h-75 w-75 align-items-center">

            <div class="s-title">

              <p class="text-right  text-dark display-2 w-100"></p>

            </div>

          </div>

        </div>

        <div class="carousel-item active">

        <div>

              

            <img src="{{ URL::asset('public/assets/images/ration_store.jpg') }}" class="img-fluid slider" alt="" title="">

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

    

  </section>

  <!-- end slider -->



<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/ration_products">Raashan Products</a></li>

  </ol>

</nav>





<!--section class="container-fluid py-3">

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

  </section-->



  <section class="py-2 container-fluid" id="aboutus">

  	<div class="row">

      <!--button id="change-button">CHANGE VW</button-->
<div class="outer-container">
<div id="eight-day-sticky-section-sticky-wrapper" class="sticky-wrapper">
  <div id="eight-day-sticky-section" class="sticky-section">
    <div class="scrollmenu-fade">
      <div class="scrollmenu">
      @foreach($categories as $key=>$value)
        <a href="/ration-products/{{$value->id}}" class="active-highlight tour-details-section-active">{{$value->subcategory_name}}</a>
        @endforeach
      </div>
    </div>
  </div> 
</div>
</div>

  		<div class="col-md-3 hidden-xs">

  			@include('filter')

  		</div>

  		<div class="col-md-9">

<!-- Product Start -->
			@if (count($products) == 0)
			   <div class="alert alert-danger">
  <strong>Sorry!</strong> No Product Found.
</div>
			@endif

    @foreach($products->chunk(4) as $items)

		<div class="row course-set courses__row">

		    @foreach($items as $item)

		        <article class="col-sm-12 col-md-3 co-lg-4 course-block course-block-lessons">

		            <div class="thumbnail" >

               <div class="post-thumb"><img src="{{ URL::asset('public/assets/images/products') }}/{{ $item->product_image }}" alt="{{ $item->product_name }}" class="img-thumbnail" width="140px" height="140px"/></div>

               <h5 class="post-title">{{ $item->product_name }}</h5>

               <div class="prod_caption">

               <h5 class="text-left post-price">{{$item->product_weight}} / <i class="fa fa-inr"></i> {{$item->product_price}}</h5>

               <!--a href="/cart/add/{{$item->id}}" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add Cart</a-->
               <button id="{{$item->id}}" class="btn btn-success btn-product add2Cart"><span class="glyphicon glyphicon-shopping-cart"></span> Add Cart</button>

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

<script>

	$(document).ready(function() {

			$('.minus').click(function () {

				var $input = $(this).parent().find('input');

				var count = parseInt($input.val()) - 1;

				count = count < 1 ? 1 : count;

				$input.val(count);

				$input.change();

				return false;

			});

			$('.plus').click(function () {

				var $input = $(this).parent().find('input');

				$input.val(parseInt($input.val()) + 1);

				$input.change();

				return false;

			});

		});

</script>

@endsection

