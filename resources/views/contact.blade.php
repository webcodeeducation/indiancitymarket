@extends('layouts.master')

@section('content')
	



<div class="container-fluid no-gutters px-0 topimg">

	<img src="img/tech1.jpg" class="img-fluid wow fadeIn">

	<div class="row justify-content-center no-gutters bottom-right">

	<form class="search form-group wow fadeInUp my-1" action="action_page.php">

  		<input type="text" class="form-control" placeholder="Search City" name="search">

 		 <button type="submit" class="btn btn-lg"><i class="fa fa-search"></i></button>

	</form>

		<div class="col-12 col-md-8">

		</div>

		<div class="col-12 col-md-4">



		</div>

	</div>



</div>



@include('layouts.contact')









@endsection