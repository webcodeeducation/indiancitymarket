@extends('layouts.master')
@section('content')

<style>
.center{
width: 150px;
margin: 40px auto; 
}
.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
        width:20%;
        display: inline !important;
    }
    .actions .btn{
        width:36%;
        margin:1.5em 0;
    }
    .actions .btn-info{

        float:left;

    }

    .actions .btn-danger{

        float:right;

    }

    

    table#cart thead { display: none; }

    table#cart tbody td { display: block; padding: .6rem; min-width:320px;}

    table#cart tbody tr td:first-child { background: #333; color: #fff; }

    table#cart tbody td:before {

        content: attr(data-th); font-weight: bold;

        display: inline-block; width: 8rem;

    }

    table#cart tfoot td{display:block; }

    table#cart tfoot td .btn{display:block;}

}

/*custom code*/

input,

textarea {

  border: 1px solid #eeeeee;

  box-sizing: border-box;

  margin: 0;

  outline: none;

  padding: 10px;

}

input[type="button"] {

  -webkit-appearance: button;

  cursor: pointer;

}

input::-webkit-outer-spin-button,

input::-webkit-inner-spin-button {

  -webkit-appearance: none;

}



.input-group {

  clear: both;

  margin: 15px 0;

  position: relative;

}



.input-group input[type='button'] {

  background-color: #eeeeee;

  min-width: 38px;

  width: auto;

  transition: all 300ms ease;

}



.input-group .button-minus,

.input-group .button-plus {

  font-weight: bold;

  height: 38px;

  padding: 0;

  width: 38px;

  position: relative;

}



.input-group .quantity-field {

  position: relative;

  height: 38px;

  left: -6px;

  text-align: center;

  width: 62px;

  display: inline-block;

  font-size: 13px;

  margin: 0 0 5px;

  resize: vertical;

}

.button-plus {

  left: -13px;

}

input[type="number"] {

  -moz-appearance: textfield;

  -webkit-appearance: none;

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
            <div class="table-responsive">
                
<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
 <tbody>
                        @foreach($cartitems as $key1 => $item)
						<tr>
                            <td><img src="{{ URL::asset('public/assets/images/products') }}/{{ $item['photo'] }}" /> </td>
                            <td>{{ $item['name'] }}</td>
                            <td>In stock</td>
                            <td style="float:left;"><button class="btn btn-primary button-minus btnMinus" data-field="quantity" id="{{$key1}}" data-prodid="{{$key1}}">-</button><input class="form-control" type="text" value="{{ $item['quantity'] }}" style="width:100px;" size="3"/><button class="btn btn-primary button-plus btnPlus" data-field="quantity" data-prodid="{{$key1}}">+</button></td>
                            <td class="text-right">RS. {{ $item['price'] }}</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger btnDeleteCartItem" id="{{$key1}}"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                    @endforeach
                    <!--tr>
                            <td colspan="2"><input type="text" name="product" class="form-control" value="" placeholder="Enter Product Name" /></td>
                            <td><input type="text" name="product" class="form-control" value="" placeholder="Enter Quantity"/></td>
                            <td><input type="text" name="product" class="form-control" value="" disabled="disabled" /></td>
                            <td><input type="text" name="product" class="form-control" value="" /></td>
                            <td></td>
                        </tr-->
                    </tbody>
                </table>

                     </div>
        </div>
        <div class="col mb-2">
          <div class="row">
            <div class="col-xs-2 col-sm-3  col-md-3">
                    <a class="btn btn-md btn-block btn-primary btn-sm btnshopping" href="/ration-products">Continue Shopping</a>
                </div>
                <div class="col-sm-8 col-md-8 text-center">
                      <form action="/checkout" method="post">
                        {{csrf_field()}}
                    <div class="form-group">
                      <textarea class="form-control" rows="3" id="extra" name="extra"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>
                </div>
            </div>

            <!--div class="row">
                <div class="col-sm-4  col-md-3">
                    <a class="btn btn-md btn-block btn-primary" href="/ration-products">Continue Shopping</a>
                </div>
                <div class="col-sm-4 col-md-3 text-right">
                    <a class="btn btn-md btn-block btn-success" href="/checkout">Checkout</a>
                </div>
            </div-->
        </div>
    </div>
</div>



                </main>

                <aside class="col-sm-2 col-xs-2">

                    <a href="/emptycart" class="btn btn-danger btn-block mb-4 btn-sm btnClearCart">Clear Cart</a>

                    <p class="alert alert-success">Enter Pincode first to shipping your order. </p>

                    <dl class="dlist-align h4">

                        <dt>Total:</dt>

                        <dd class="text-right"><strong>Rs (INR). {{ Session::get('total')}}</strong></dd>

                    </dl>

                    <hr>

                    <figure class="itemside mb-3">

                        <aside class="aside"><img src="http://indiancitymarket.com/public/assets/images/icons/pay-visa.png"></aside>

                        <div class="text-wrap small text-muted">

                            

                        </div>

                    </figure>				

					<form action="/submitorder" style="display:none;">

					{{csrf_field()}}

				  <div class="form-group">

					<label for="email">Email address:</label>

					<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required="required">

				  </div>

				  <div class="form-group">

					<label for="email">Contact:</label>

					<input type="text" class="form-control" name="contact" id="contact" value="{{ old('contact') }}" required="required">

				  </div>

				  <div class="form-group">

			          <label for="address">Enter Pincode:</label>

			          <input type="text" class="form-control" name="pincode" id="pincode" value="{{ old('pincode') }}" required="required">

			        </div>

				  <div class="form-group">

				  <label for="address">Address:</label>

				  <textarea class="form-control" name="address" rows="5" id="address">{{ old('address') }}</textarea>

				</div>
        <div class="form-group">

          <label for="address">Message:</label>

          <textarea class="form-control" name="message" rows="5" id="message">{{ old('message') }}</textarea>

        </div>

				<div class="form-group">

				  <label for="sel1">Select Shop:</label>

				  <select class="form-control" name="shop_name" id="select_shop">

				  </select>

				</div>

				  <button type="submit" class="btn btn-success btn-lg btn-block">Submit Order</button>

				</form>

                </aside>

            </div>

        </div>

    </section>







    <script>



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

