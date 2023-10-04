<!doctype html>
<html lang="{{ app()->getLocale() }}" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Indiancitymarket: A Open Market to all over India</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/font-awesome.min.css') }}">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/dataTables.bootstrap.min.css') }}">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/bootstrap-social.css') }}">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/bootstrap-select.css') }}">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/fileinput.min.css') }}">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/awesome-bootstrap-checkbox.css') }}">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/style.css') }}">
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
  <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>


</head>

<body>
    @yield('content')

    <!-- Loading Scripts -->
    <script src="{{ URL::asset('public/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/fileinput.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/chartData.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/main.js') }}"></script>

</body>

</html>
