@extends('layouts.master')
@section('content')
<div class="banner">
		<div class="w3l_banner_nav_right">
<!-- about -->
<!---728x90--->

		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			
	      <div class="checkout-right">
					<h4>Your shopping cart contains: <span>3 Products</span></h4>
				<table class="timetable_sub" id="myTable">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody id="myItems">
					</tbody></table>
			</div>
			<!---728x90--->
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul id="myBasket">
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>Add a new Details</h4>
				<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Full name: </label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Mobile number:</label>
														    <input class="form-control" type="text" placeholder="Mobile number">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Landmark: </label>
														 <input class="form-control" type="text" placeholder="Landmark">
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Town/City: </label>
												 <input class="form-control" type="text" placeholder="Town/City">
												</div>
													<div class="controls">
															<label class="control-label">Address type: </label>
												     <select class="form-control option-w3ls">
																							<option>Office</option>
																							<option>Home</option>
																							<option>Commercial</option>
							
																					</select>
													</div>
											</div>
											<button class="submit check_out">Delivery to this Address</button>
										</div>
									</section>
								</form>
									<div class="checkout-right-basket">
				        	<a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>

	<!--script src="//cdnjs.cloudflare.com/ajax/libs/minicart/3.0.5/minicart.min.js"></script-->
<script src="{{ URL::asset('public/assets/grocery/js/minicart.js') }}"></script>
<script>
    paypal.minicart.render();
     /*paypal.minicart.render({
      parent: document.getElementById("cart")
    });*/
/*var items1 = paypal.minicart.cart.items();
items1.forEach(function(item, index, arr){
  console.log('myitem' +item);
});*/

// Find a <table> element with id="myTable":
var table = document.getElementById("myItems");
var basket = document.getElementById("myBasket");

var cartTotal = paypal.minicart.cart.total();
//$('input#cart').val('$' + cartTotal);
console.log(cartTotal);

paypal.minicart.cart.items().forEach(function(item, index, arr){
  console.log(item);
  // Create an empty <tr> element and add it to the 1st position of the table:
var row = table.insertRow(0);
  // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3 = row.insertCell(2);
var cell4 = row.insertCell(3);
var cell5 = row.insertCell(4);
var cell6 = row.insertCell(5);

// Add some text to the new cells:
cell1.innerHTML = index;
cell2.innerHTML = item._data.item_name.toUpperCase();
cell3.innerHTML = '<div class="quantity"><div class="quantity-select"><div class="entry value-minus">&nbsp;</div><div class="entry value"><span>' + item._data.quantity + '</span></div><div class="entry value-plus active">&nbsp;</div></div></div>';
cell4.innerHTML = item._data.item_name.toUpperCase();
cell5.innerHTML = '$ ' +parseFloat(item._data.amount * item._data.quantity);
cell6.innerHTML = '<div class="rem"><div class="close3"></div></div>';

//<li>Product1 <i>-</i> <span>$15.00 </span></li>

var li = document.createElement('li');
            li.setAttribute('class','item');
            li.innerHTML=item._data.item_name.toUpperCase() + '<i>-</i> ' + '<span> $ ' +parseFloat(item._data.amount * item._data.quantity) + '</span>';
basket.appendChild(li);
            


}
   );

var li = document.createElement('li');
            li.setAttribute('class','item');
            li.innerHTML='Total' + '<i>-</i> ' + '<span> $ ' +parseFloat(cartTotal.toFixed(2)) + '</span>';
basket.appendChild(li);


    //console.log('items: ' + paypal.minicart.cart.items());
</script>

@endsection