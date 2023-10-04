@extends('layouts.master')
@section('content')
<style>
section {
    margin-top: 100px;
}
</style>
<section class="mx-auto">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">

    <div class="alert alert-success showinfo" style="display:none;">
        <div id="response_here"></div>
    </div>

                
                <div class="card">
                    <div class="card-header">Register Shop</div>
                    <div class="card-body">
                        <form action="/registershop" method="post" id="registerform">
                          {{csrf_field()}}
                            <div class="form-group row">
                                <label for="shopname" class="col-md-4 col-form-label text-md-right">Shop Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="shopname" class="form-control" name="shopname" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" id="mobile" class="form-control" name="mobile" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="address" class="form-control" name="address" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <input type="text" id="country" class="form-control" name="country" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <input type="text" id="state" class="form-control" name="state" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <input type="text" id="city" class="form-control" name="city" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pincode" class="col-md-4 col-form-label text-md-right">Pincode</label>
                                <div class="col-md-6">
                                    <input type="text" id="pincode" class="form-control" name="pincode" value="" required autofocus>
                                </div>
                            </div>

                                                        <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="username" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" value="" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btnRegister31">
                                    Register
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection