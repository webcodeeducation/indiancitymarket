@extends('layouts.master')
@section('content')

<style>
section#filter {
    margin-left: 60px;
}
</style>	


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
    <div class="col-1 col-md-6">      

    </div>

    <div class="col-12 col-md-6">

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
    <li class="breadcrumb-item active"><a href="/fruits-vegetables">Fruit and veggis</a></li>
  </ol>
</nav>





<section class="container-fluid py-3" style="display: none;">

    <div class="row justify-content-center align-items-center">

      <div class="col-12 py-2  col-md-3 mx-auto text-center">

        <a href="/fruits-vegetables">

        <button class="btn btn-lg btn-primary py-3 btn-block"> Fruit and Veggis</button>

      </a>

      </div>

      <div class="col-12 py-2 col-md-3 mx-auto text-center">

        <a href="ration.php">

        <button class="btn btn-lg btn-success px-5 py-3 btn-block"> Ration</button>   

          </a>

      </div>

      <div class="col-12 py-2 col-md-3 mx-auto text-center" style="display: none;">

        <a href="cake.php">

        <button class="btn btn-lg btn-danger px-5 py-3 btn-block"> Cake</button>    

          </a>

      </div>

    </div>

  </section>



  <section class="py-2 container-fluid" id="aboutus">

  	<div class="row">

  		<div class="col-md-3 hidden-xs">

  			@include('filter')

  		</div>

  		<div class="col-md-9">

<!-- Product Start -->

    @foreach($products->chunk(4) as $items)

		<div class="row course-set courses__row">

		    @foreach($items as $item)

		        <article class="col-sm-12 col-md-3 co-lg-4 course-block course-block-lessons">

		            <div class="thumbnail" >

               <div class="post-thumb"><img src="{{ URL::asset('public/assets/products') }}/{{ $item->product_image }}" alt="{{ $item->product_name }}" class="img-thumbnail" /></div>

               <h3 class="text-center post-title">{{ $item->product_name }}</h3>

               <div class="prod_caption">

               <h4 class="text-left post-price"><i class="fa fa-inr"></i> {{$item->product_price}}</h4>

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







@include('layouts.contact')

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

