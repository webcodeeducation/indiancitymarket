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

    <li class="breadcrumb-item active"><a href="/ration_products"</a></li>

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
        <a href="/products/{{$value->id}}" class="active-highlight tour-details-section-active">{{$value->subcategory_name}}</a>
        @endforeach
      </div>
    </div>
  </div> 
</div>
</div>









<section class="py-2 container-fluid" id="aboutus">

		<article class="m-md-5 row justify-content-center align-items-center">

			<div class="col-12 col-lg-6 mx-auto text-center my-2 order-md-1 order-2">
				@foreach($photos as $key=>$value)
				<a href="/offer"><img src="{{ URL::asset('public/assets/offers/icm_offer_1.png') }}" class="img-fluid wow fadeIn" alt="it web solutions" title="Great Offer"></a>
				@endforeach

			</div>



			</article>

			</section>	

			@include('layouts.contact')

@endsection
