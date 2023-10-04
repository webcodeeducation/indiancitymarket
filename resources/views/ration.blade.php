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

  </section>

  <!-- end slider -->



<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/grocery">Grocery</a></li>

    

  </ol>

</nav>





<section class="container-fluid py-3">

    <div class="row justify-content-center align-items-center">

      <div class="col-12 py-2  col-md-3 mx-auto text-center">

        <a href="/fruits-vegetables">

        <button class="btn btn-lg btn-primary py-3 btn-block"> Raashan Products</button>

      </a>

      </div>

      <div class="col-12 py-2 col-md-3 mx-auto text-center">

        <a href="/ration-products">

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

    <article class="m-md-5 row justify-content-center align-items-center">

      <div class="col-12 col-lg-6 mx-auto text-center my-2 order-md-1 order-2">

        <img src="img/450x300.jpg" class="img-fluid wow fadeIn" alt="best it web solutions" title="Latest web solutions">

      </div>

      <div class="col-12 col-lg-6 bg-li my-2 order-md-2 order-1">

        <h2 class="py-4 display-3 text-center title-space wow fadeInUp">ABOUT</h2>

        <p class="px-2 px-md-4 text-justify content wow fadeIn">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>

        

      </div>

      </article>

      </section>  

@include('layouts.contact')

@endsection