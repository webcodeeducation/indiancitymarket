<?php include 'head.php';  ?>
</head> 
<body>
<?php include 'navbar.php';  ?>
<?php include 'slider-city.php';  ?>
	


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="grocery.php">Grocery</a></li>
        <li class="breadcrumb-item active"><a href="fruits.php">Fruit and veggis</a></li>
        <li class="breadcrumb-item active"><a href="seller.php">Seller</a></li>



        <li class="float-right ml-auto"><a href="cart.php" class=" text-danger"><i class="fa fa-shopping-cart text-danger font-weight-bold"></i> &nbsp; Cart</a></li>
  </ol>
</nav>


<section class="container py-2">
		<table class="table table-hover">
  <thead>
    <tr>
      <th class="w-25" scope="col">Item</th>
      <th scope="col" class="w-25">Price</th>
      <th scope="col" class="w-25">Quantity</th>
      <th class="w-25" scope="col">Fill Cart</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Allo</th>
      <td>20Rs / Kg</td>
      <td><form><input type="numbers" name="" class="w-25">kg</form></td>
      <td><button class="btn btn-sm btn-danger"> Add to cart</button></td>
    </tr>
    <tr>
      <th>Allo</th>
      <td>20Rs / Kg</td>
      <td><form><input type="numbers" name="" class="w-25">kg</form></td>
      <td><button class="btn btn-sm btn-danger"> Add to cart</button></td>
    </tr>
    <tr>
      <th>Allo</th>
      <td>20Rs / Kg</td>
      <td><form><input type="numbers" name="" class="w-25">kg</form></td>
      <td><button class="btn btn-sm btn-danger"> Add to cart</button></td>
    </tr>
    <tr>
      <th>Allo</th>
      <td>20Rs / Kg</td>
      <td><form><input type="numbers" name="" class="w-25">kg</form></td>
      <td><button class="btn btn-sm btn-danger"> Add to cart</button></td>
    </tr>
    <tr>
      <th>Allo</th>
      <td>20Rs / Kg</td>
      <td><form><input type="numbers" name="" class="w-25">kg</form></td>
      <td><button class="btn btn-sm btn-danger"> Add to cart</button></td>
    </tr>
  </tbody>
</table>
	</section>
<section class="container-fluid py-3 px-md-5">
	<hr>					<h5 class="text-secondary">Owner's Info :</h5>
	<div class="row justify-content-center">
		<div class="col-10 col-md-8 pd-2">
		<p class="content"><b>Shop Name :</b> </p> 
		<p class="content"><b>Shop Adress : </b></p> 
		<p class="content"><b>Shop Phone Numbers :</b> </p> 
		<p class="content"><b>District : </b></p> 
		<p class="content"><b>Delivery Area : </b></p> 
		<p class="content"><b>Shop Category : </b></p> 
		</div>
		<div class="col-10 col-md-3 align-self-center text-center">
			<img src="img/user.jpg" class="img-fluid w-50">
			<div class="mx-auto">
			<p class="display-4">Owner Name</p>
		</div>
				</div>




	</div>
</section>	

	<?php include 'about.php';  ?>
	
<?php include 'contact-sec.php';  ?>
<?php include 'foot-sec.php';  ?>
