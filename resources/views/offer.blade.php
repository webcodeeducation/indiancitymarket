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
td img {
	width:  150px;
    height: 150px;
    object-fit: cover;
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
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                        </tr>
                    </thead>
 <tbody>
                        	<tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/chini.jpg"> </td>
                            <td>Sugar</td>
                            <td>5 KG</td>
                            <td>INR 190</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/taj_mahal.jpg"> </td>
                            <td>Tea</td>
                            <td>250 GM</td>
                            <td>INR 135</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/oil.jpg"> </td>
                            <td>Sarso Oil</td>
                            <td>2 Ltr.</td>
                            <td>INR 250</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/refined_old.jpg"> </td>
                            <td>Refined</td>
                            <td>2 Ltr</td>
                            <td>INR 220</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/tata_salt.jpg"> </td>
                            <td>Salt</td>
                            <td>2 KG</td>
                            <td>INR 38</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/rajma.jpg"> </td>
                            <td>Rajma</td>
                            <td>500 GM</td>
                            <td>INR 55</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/kala_chana.jpg"> </td>
                            <td>Kala Chana</td>
                            <td>500 GM</td>
                            <td>INR 35</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/safed_chana.jpg"> </td>
                            <td>Safed Chana</td>
                            <td>500 GM</td>
                            <td>INR 40</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/mung_dal.jpg"> </td>
                            <td>Munga Daal</td>
                            <td>500 GM</td>
                            <td>INR 60</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/arhar_dal.jpg"> </td>
                            <td>Arhar Daal</td>
                            <td>500 GM</td>
                            <td>INR 60</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/sabut_masur.jpg"> </td>
                            <td>Sabut Masoor</td>
                            <td>500 GM</td>
                            <td>INR 45</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/masur_dal.jpg"> </td>
                            <td>Masoor Daal</td>
                            <td>500 GM</td>
                            <td>INR 50</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/kali_udad_dal.jpg"> </td>
                            <td>Kali Udad Daal</td>
                            <td>500 GM</td>
                            <td>INR 55</td>
                        </tr>
                         <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/urad_chilka.jpg"> </td>
                            <td>Mung Chilka</td>
                            <td>500 GM</td>
                            <td>INR 60</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/rajdhani_besan.jpg"> </td>
                            <td>Besan</td>
                            <td>500 GM</td>
                            <td>INR 45</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/happik.jpg"> </td>
                            <td>Harpick</td>
                            <td>650 ML</td>
                            <td>INR 86</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/surf_excel_blue.jpg"> </td>
                            <td>Surf Excel</td>
                            <td>1 KG</td>
                            <td>INR 95</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/rin.jpg"> </td>
                            <td>Rin Sabun</td>
                            <td>4 Pcs</td>
                            <td>INR 116</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/lux.jpg"> </td>
                            <td>Lux Sabun</td>
                            <td>3 Pcs</td>
                            <td>INR 120</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/vim_250.jpg"> </td>
                            <td>Vim Bar</td>
                            <td>1 Bottle</td>
                            <td>INR 48</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/haldi_catch.jpg"> </td>
                            <td>Haldi</td>
                            <td>250 GM</td>
                            <td>INR 50</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/mirchi.jpg"> </td>
                            <td>Mirch</td>
                            <td>250 GM</td>
                            <td>INR 70</td>
                        </tr>
                        <tr>
                            <td><img src="http://indiancitymarket.com/public/assets/offers/phenyl.jpg"> </td>
                            <td>Phenyle</td>
                            <td>2 Ltr.</td>
                            <td>INR 70</td>
                        </tr>
                       
                    </tbody>
                </table>

                     </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-4  col-md-3">
                    <a class="btn btn-md btn-block btn-primary" href="/ration-products">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>



                </main>

                <aside class="col-sm-3">

                    <a href="/emptycart" class="btn btn-danger btn-block mb-4">Clear Cart</a>

                    <p class="alert alert-success">Enter Pincode first to shipping your order. </p>

                    <dl class="dlist-align h4">

                        <dt>Total:</dt>

                        <dd class="text-right"><strong>Rs (INR). 1988</strong></dd>

                    </dl>

                    <hr>

                    <figure class="itemside mb-3">

                        <aside class="aside"><img src="http://indiancitymarket.com/public/assets/images/icons/pay-visa.png"></aside>

                        <div class="text-wrap small text-muted">

                            <div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>

                        </div>

                    </figure>				

					<form action="/submitoffer" style="" method="post">

					{{csrf_field()}}

				  <div class="form-group">

					<label for="email">Name:</label>

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

