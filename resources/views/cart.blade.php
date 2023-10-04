@extends('layouts.master')
@section('content')

<style>
.center{
width: 150px;
margin: 40px auto; 
}
/* Global settings */
 
.product-image {
  float: left;
  width: 20%;
}
 
.product-details {
  float: left;
  width: 37%;
}
 
.product-price {
  float: left;
  width: 12%;
}
 
.product-quantity {
  float: left;
  width: 10%;
}
 
.product-removal {
  float: left;
  width: 9%;
}
 
.product-line-price {
  float: left;
  width: 12%;
  text-align: right;
}
 
/* This is used as the traditional .clearfix class */
.group:before, .shopping-cart:before, .column-labels:before, .product:before, .totals-item:before,
.group:after,
.shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
  content: '';
  display: table;
}
 
.group:after, .shopping-cart:after, .column-labels:after, .product:after, .totals-item:after {
  clear: both;
}
 
.group, .shopping-cart, .column-labels, .product, .totals-item {
  zoom: 1;
}
 
/* Apply clearfix in a few places */
/* Apply dollar signs */
/*.product .product-price:before, .product .product-line-price:before, .totals-value:before {
  content: '$';
}*/
 
/* Body/Header stuff */
body {
  padding: 0px 30px 30px 20px;
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: 100;
}
 
h1 {
  font-weight: 100;
}
 
label {
  color: #aaa;
}
 
.shopping-cart {
  margin-top: -45px;
}
 
/* Column headers */
.column-labels label {
  padding-bottom: 15px;
  margin-bottom: 15px;
  border-bottom: 1px solid #eee;
}
.column-labels .product-image, .column-labels .product-details, .column-labels .product-removal {
  text-indent: -9999px;
}
 
/* Product entries */
.product {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}
.product .product-image {
  text-align: center;
}
.product .product-image img {
  width: 100px;
}
.product .product-details .product-title {
  margin-right: 20px;
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}
.product .product-details .product-description {
  margin: 5px 20px 5px 0;
  line-height: 1.4em;
}
.product .product-quantity input {
  width: 40px;
}
.product .remove-product {
  border: 0;
  padding: 4px 8px;
  background-color: #c66;
  color: #fff;
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
  font-size: 12px;
  border-radius: 3px;
}
.product .remove-product:hover {
  background-color: #a44;
}
 
/* Totals section */
.totals .totals-item {
  float: right;
  clear: both;
  width: 100%;
  margin-bottom: 10px;
}
.totals .totals-item label {
  float: left;
  clear: both;
  width: 79%;
  text-align: right;
}
.totals .totals-item .totals-value {
  float: right;
  width: 21%;
  text-align: right;
}
.totals .totals-item-total {
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}
 
.checkout {
  float: right;
  border: 0;
  margin-top: 20px;
  padding: 6px 25px;
  background-color: #6b6;
  color: #fff;
  font-size: 25px;
  border-radius: 3px;
}
 
.checkout:hover {
  background-color: #494;
}
 
/* Make adjustments for tablet */
@media screen and (max-width: 650px) {
  .shopping-cart {
    margin: 0;
    padding-top: 20px;
    border-top: 1px solid #eee;
  }
 
  .column-labels {
    display: none;
  }
 
  .product-image {
    float: right;
    width: auto;
  }
  .product-image img {
    margin: 0 0 10px 10px;
  }
 
  .product-details {
    float: none;
    margin-bottom: 10px;
    width: auto;
  }
 
  .product-price {
    clear: both;
    width: 70px;
  }
 
  .product-quantity {
    width: 100px;
  }
  .product-quantity input {
    margin-left: 20px;
  }
 
  .product-quantity:before {
    content: 'x';
  }
 
  .product-removal {
    width: auto;
  }
 
  .product-line-price {
    float: right;
    width: 70px;
  }
}
/* Make more adjustments for phone */
@media screen and (max-width: 350px) {
  .product-removal {
    float: right;
  }
 
  .product-line-price {
    float: right;
    clear: left;
    width: auto;
    margin-top: 10px;
  }
 
  .product .product-line-price:before {
    content: 'Item Total: $';
  }
 
  .totals .totals-item label {
    width: 60%;
  }
  .totals .totals-item .totals-value {
    width: 40%;
  }
} 

</style>



<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/cart">Cart</a></li>

    

  </ol>

</nav>

    <section class="section-content bg padding-y border-top">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    @if (Session::has('message'))

                        <p class="alert alert-success">{{ Session::get('message') }}</p>

                    @endif

                </div>

            </div>

            <div class="row">

                <main class="col-sm-9">

                    @if ($errors->any())

    <div class="alert alert-danger">

        <ul class="showerror">

            @foreach ($errors->all() as $error)

                <li class="error">{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

          <div class="flash-message">

      @foreach (['danger', 'warning', 'success', 'info'] as $msg)

        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>

        @endif

      @endforeach

    </div>



    <div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="shopping-cart">
 
  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>
 

 @foreach($cartitems as $key1 => $item)
  <div class="product">
    <div class="product-image">
      <img src="{{ URL::asset('public/assets/images/products') }}/{{ $item['photo'] }}">
    </div>
    <div class="product-details">
      <div class="product-title">{{ $item['name'] }}</div>
      <!--p class="product-description">{{ $item['name'] }}</p-->
    </div>
    <div class="product-price">Rs. {{ $item['price'] }}</div>
    <div class="product-quantity">
      <input type="number" value="{{ $item['quantity'] }}" min="1" id="{{$key1}}" data-price="{{ $item['price'] }}">
    </div>
    <div class="product-removal">
      <button class="remove-product btnDeleteCartItem" id="{{$key1}}">
        Remove
      </button>
    </div>
    <div class="product-line-price updatedprice">Rs. {{ $item['price'] * $item['quantity'] }}</div>
  </div>

  @endforeach
     
      <a href="/checkout" class="checkout">Checkout</a>
 
</div>
        </div>

    </div>
</div>



                </main>

                <aside class="col-sm-2 col-xs-2">

                    <a href="/emptycart" class="btn btn-danger btn-block mb-4 btn-sm btnClearCart">Clear Cart</a>

                    <p class="alert alert-success">Enter Pincode first to shipping your order. </p>

                    <dl class="dlist-align h4">

                        <dt>Total:</dt>

                        <dd class="text-right"><strong>Rs (INR). @if(!empty(Session::get('total'))) 
                                                                  {!! Session::get('total') !!} 
                                                                  @endif</strong></dd>

                    </dl>

                    <hr>

                    <figure class="itemside mb-3">

                        <aside class="aside"><img src="http://indiancitymarket.com/public/assets/images/icons/pay-visa.png"></aside>

                        <div class="text-wrap small text-muted">

                            

                        </div>

                    </figure>				

					

                </aside>

            </div>

        </div>

    </section>







    <script>


$(document).ready(function() {
 
/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00; 
var fadeTime = 300;
 
 
/* Assign actions */
$('.product-quantity input').change( function() {
  //console.log($(this).attr('id'));
  var token = $('meta[name=csrf-token]').attr("content");
  var price = $(this).data('price');
  //console.log($(this).attr('id') + price);
  var quantity = $(this).val();
  console.log(quantity);
  //$('.updatedprice').text(price * quantity);
  $.post('/updateproductprice', {'_token':token,'id': $(this).attr('id'), 'price':price, 'quantity':quantity}, function(data){
    console.log(data);
    //location.reload();
  });
  updateQuantity(this);
});
 
$('.product-removal button').click( function() {
  removeItem(this);
});
 
 
/* Recalculate cart */
function recalculateCart()
{
  var subtotal = 0;
   
  /* Sum up row totals */
  $('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });
   
  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;
   
  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
      $('.checkout').fadeOut(fadeTime);
    }else{
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}
 
 
/* Update quantity */
function updateQuantity(quantityInput)
{
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;
  //console.log(Object.keys(productRow) + price + quantity + linePrice);
   
  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });  
}
 
 
/* Remove item from cart */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });
}
 
});
 



/*function incrementValue(e) {

  e.preventDefault();

  var fieldName = $(e.target).data('field');

  var parent = $(e.target).closest('div');

  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);



  if (!isNaN(currentVal)) {

    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);

  } else {

    parent.find('input[name=' + fieldName + ']').val(1);

  }

}



function decrementValue(e) {

  e.preventDefault();

  var fieldName = $(e.target).data('field');

  var parent = $(e.target).closest('div');

  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);



  if (!isNaN(currentVal) && currentVal > 0) {

    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);

  } else {

    parent.find('input[name=' + fieldName + ']').val(1);

  }

}



$('.input-group').on('click', '.button-plus', function(e) {

  incrementValue(e);

});



$('.input-group').on('click', '.button-minus', function(e) {

  decrementValue(e);

});*/



    </script>



@endsection

