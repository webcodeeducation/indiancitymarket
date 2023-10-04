@extends('layouts.master')
@section('content')

<style>
.center{
width: 150px;
  margin: 40px auto; 
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
                    
                        <div class="card">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" width="120">Total</th>
                                    <th scope="col" class="text-right" width="200">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cartitems as $key1 => $item)
                                    <tr>
                                        <td>
                                          <img src="{{ URL::asset('public/assets/products') }}/{{ $item['photo'] }}" alt="Remove Item" class="img-thumbnail" />
                                            <figure class="media">
                                                <figcaption class="media-body">
                                                    <h6 class="title text-truncate">{{ $item['name'] }}</h6>
                                                    @foreach($item as $key  => $value)
                                                        <dl class="dlist-inline small">
                                                            <dt>{{ $key }}: </dt>
                                                            <dd>{{ $value }}</dd>
                                                        </dl>
                                                    @endforeach
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                           <div class="product-quantity">
                                              <input type="number" value="{{ $item['quantity'] }}" min="1">
                                            </div>                                                                        
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">{{ $item['price'] }}</var>
                                                <small class="text-muted">each</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product-price">{{ $item['price'] }}</div>
                                        </td>
                                        <td class="text-right">
                                            <a href="/remove-from-cart?id={{$key1}}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </main>
                <aside class="col-sm-3">
                    <a href="/remove-from-cart" class="btn btn-danger btn-block mb-4">Clear Cart</a>
                    <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
                    <dl class="dlist-align h4">
                        <dt>Total:</dt>
                        <dd class="text-right"><strong>{{ $cartCount }}</strong></dd>
                    </dl>
                    <hr>
                    <figure class="itemside mb-3">
                        <aside class="aside"><img src="http://indiancitymarket.com/public/assets/images/icons/pay-visa.png"></aside>
                        <div class="text-wrap small text-muted">
                            Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside"> <img src="http://indiancitymarket.com/public/assets/images/icons/pay-mastercard.png"> </aside>
                        <div class="text-wrap small text-muted">
                            Pay by MasterCard and Save 40%.
                            <br> Lorem ipsum dolor
                        </div>
                    </figure>
                    <a href="/checkout/index" class="btn btn-success btn-lg btn-block">Proceed To Checkout</a>
                </aside>
            </div>
        </div>
    </section>

@endsection
