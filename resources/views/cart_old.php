<?php include 'head.php';  ?>
</head> 
<body>
<?php include 'navbar.php';  ?>
	
<section class="container p-4">
  <h5 class="text-danger pt-5"> Cart items :</h5>
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th class="w-25" scope="col">Item</th>
      <th scope="col" class="w-25">Quantity</th>
      <th scope="col" class="w-25">Amount(in Rs.)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Allo</th>
      <td>1Kg</td>
      <td>20</td>
    </tr>
    <tr>
      <th>Allo</th>
      <td>1Kg</td>
      <td>20</td>
    </tr>
    <tr>
      <th>Allo</th>
      <td>1Kg</td>
      <td>20</td>
    </tr>
    <tr>
      <th><img src="img/item.jpg" class="img-fluid" style="width: 100px;">
        <p class="py-1">Denim t-shirt kids section</p></th>
      <td>1</td>
      <td>200</td>
    </tr>
    <tr>
      <td></td>

      <th class="text-danger">Total :</th>
      <td class="text-danger"><b>260 Rs </b></td>
    </tr>
  </tbody>
</table>
<div class="row justify-content-end">
  <div class="col-6 col-md-4">
    <a class="btn btn-primary text-light btn-block p-2"><i class="fa fa-envelope font-weight-bold"></i> &nbsp; Email Order</a>
  </div>
  <div class="col-6 col-md-4">
    <a class="btn btn-success text-light btn-block p-2"><i class="fa fa-whatsapp font-weight-bold"></i> &nbsp; Whatsapp Order</a>
  </div>
</div>
</section>  

	<?php include 'about.php';  ?>
	
<?php include 'contact-sec.php';  ?>
<?php include 'foot-sec.php';  ?>
