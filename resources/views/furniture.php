<?php include 'head.php';  ?>
</head> 
<body>
<?php include 'navbar.php';  ?>
	

<?php include 'slider-city.php';  ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="resale.php">Resale</a></li>
    <li class="breadcrumb-item active"><a href="furniture.php">Furniture</a></li>
    
  </ol>
</nav>


<section class="container-fluid py-2">
		<div class="container-fluid text-center mx-auto">
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item mx-auto">
      <a class="nav-link active" data-toggle="pill" href="#home">Chair</a>
    </li>
    <li class="nav-item mx-auto">
      <a class="nav-link" data-toggle="pill" href="#menu1">Table</a>
    </li>
    <li class="nav-item mx-auto">
      <a class="nav-link" data-toggle="pill" href="#menu2">Bed</a>
    </li>
    <li class="nav-item mx-auto">
      <a class="nav-link" data-toggle="pill" href="#menu3">Others</a>
    </li>
  </ul>
  <hr>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      	<div class="row justify-content-center">
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/chair.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/chair.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/chair.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/chair.jpg" class="img-fluid">
      		</div>
      	</div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <div class="row justify-content-center">
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/table.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/table.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/table.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/table.jpg" class="img-fluid">
      		</div>
      	</div>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
            <div class="row justify-content-center">
      <div class="col-6 col-md-4 py-1">
      			<img src="img/bed.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/bed.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/bed.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/bed.jpg" class="img-fluid">
      		</div>
      	</div>
    </div>
    <div id="menu3" class="container tab-pane fade"><br>
            <div class="row justify-content-center">
      <div class="col-6 col-md-4 py-1">
      			<img src="img/bed.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/table.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/chair.jpg" class="img-fluid">
      		</div>
      		<div class="col-6 col-md-4 py-1">
      			<img src="img/bed.jpg" class="img-fluid">
      		</div>
      	</div>
    </div>
  </div>
</div>
	</section>

	<?php include 'about.php';  ?>

<?php include 'contact-sec.php';  ?>
<?php include 'foot-sec.php';  ?>
