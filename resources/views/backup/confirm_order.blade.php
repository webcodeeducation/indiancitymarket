@extends('layouts.master')
@section('content')
<div class="banner">
		<div class="w3l_banner_nav_right">
<!-- about -->
<!---728x90--->

		<div class="privacy about">
			<h3 style="color:#0fad00"><span>Success</span></h3>
			
	      <div class="checkout-right">
									
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br>
        <!--img src="{{ URL::asset('public/assets/grocery/images/order_ok.png') }}"-->
        <h3>Dear Customer</h3>
        <p>Order ID: {{$orderid}}</p>
        <p style="font-size:20px;color:#5C5C5C;">Thank you for an Order. We have deliver you this an order with your details
Please go to your above email now and login.</p>
    <br><br>
        </div>
        
	</div>


			</div>


		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>

	<script src="//cdnjs.cloudflare.com/ajax/libs/minicart/3.0.5/minicart.min.js"></script>
<!-- <script src="{{ URL::asset('public/assets/grocery/js/minicart.js') }}"></script> -->
<script>
	//paypal.minicart.reset();
	//paypal.minicart.cart.reset();
	paypal.minicart.cart.destroy();
	//PAYPAL.apps.MiniCart.reset();
</script>

@endsection