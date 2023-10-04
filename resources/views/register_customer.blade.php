
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!--link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('public/assets/js/global.js') }}"></script>
    <!--link rel="stylesheet" href="css/style.css"-->

    <link rel="icon" href="Favicon.png">

    <title>Indian City Market</title>
    <style>
@import  url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);


body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    text-align: left;
    background-color: #f5f8fa;
}

.navbar-laravel
{
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.navbar-brand , .nav-link, .my-form, .login-form
{
    font-family: Raleway, sans-serif;
}

.my-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.my-form .row
{
    margin-left: 0;
    margin-right: 0;
}

.login-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.login-form .row
{
    margin-left: 0;
    margin-right: 0;
}
.card-header a {
    padding: 5px;
}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/">Indian City Market</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <!--li class="nav-item">
                    <a class="nav-link" href="/register/shop">Register Shop</a>
                </li-->
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

                
                <div class="card">
                    <div class="card-header"><!--a href="/register/shop">Register Shop</a-->Register</div>
                    <div class="card-body">
                        <form action="/savecustomer" method="post" id="register_customer_form">
                          {{csrf_field()}}
                            <div class="form-group row">
                                <label for="customer" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="customer" class="form-control" name="customer" value="" placeholder="Enter Full Name" required="required" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" id="mobile" class="form-control" name="mobile" value="" placeholder="Enter Mobile" required="required" autofocus>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="address" class="form-control" name="address" value="" placeholder="Enter Address" required="required" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <input type="text" id="country" class="form-control" name="country" value="India" placeholder="Enter Country" required="required" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <input type="text" id="state" class="form-control" name="state" value="" placeholder="Enter State" required="required" autofocus>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City/District</label>
                                <div class="col-md-6">
                                    <input type="text" id="city" class="form-control" name="city" value="" placeholder="Enter City" required="required" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pincode" class="col-md-4 col-form-label text-md-right">Pincode</label>
                                <div class="col-md-6">
                                    <input type="text" id="pincode" class="form-control" name="pincode" value="" placeholder="Enter Pincode" required="required" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="username" value="" placeholder="Enter Username" required="required" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" class="form-control" name="email" value="" placeholder="Enter Email" required="required" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" value="" placeholder="Enter Password" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="confirmpassword" class="form-control" name="confirmpassword" value="" placeholder="Enter Confirm Password" required="required">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btnRegister1">
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

</main>

</body>
</html>