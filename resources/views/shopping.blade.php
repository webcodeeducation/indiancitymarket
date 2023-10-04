@extends('layouts.master')
@section('content')
<style>
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


<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/shopping">Shopping</a></li>

    

  </ol>

</nav>



<section class="container-fluid py-3">
<div class="row justify-content-center align-items-center">

<!--button id="change-button">CHANGE VW</button-->
<div class="outer-container">
<div id="eight-day-sticky-section-sticky-wrapper" class="sticky-wrapper">
  <div id="eight-day-sticky-section" class="sticky-section">
    <div class="scrollmenu-fade">
      <div class="scrollmenu">
        <!--p class="scroll-display-arrow">&gt;</p-->
        @foreach($categories as $key=>$value)
          <a href="{{$value->shopping_category_name}}" class="active-highlight tour-details-section-active">{{$value->shopping_category_name}}</a>
        @endforeach
        <!--p class="scroll-display-arrow">&lt;</p-->
      </div>
    </div>
  </div> 
</div>
</div>

</div>
</section>





<section class="container-fluid py-3" style="display:none;">

		<div class="row justify-content-center align-items-center">

			<div class="col-6 py-2  col-md-3 mx-auto text-center">

				<a href="garments.php">

				<button class="btn btn-lg btn-info py-3 btn-block">Garments</button>

			</a>

			</div>

			<div class="col-6 py-2 col-md-3 mx-auto text-center">

				<a href="">

				<button class="btn btn-lg btn-info px-2 py-3 btn-block"> Electronics</button>		

					</a>

			</div>

			<div class="col-6 py-2 col-md-3 mx-auto text-center">

				<a href="">

				<button class="btn btn-lg btn-info px-2 py-3 btn-block">Footwear</button>		

					</a>

			</div>

			<div class="col-6 py-2 col-md-3 mx-auto text-center">

				<a href="">

				<button class="btn btn-lg btn-info px-2 py-3 btn-block">Furniture</button>		

					</a>

			</div>

		</div>

	</section>



@include('layouts.contact')

@endsection

