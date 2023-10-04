@extends('layouts.master')
@section('content')
<style>


</style>

<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/services">Services</a></li>
    <li class="breadcrumb-item active"><a href="/serviceprovider/add">Register as Service Provider</a></li>
    
       

  </ol>

</nav>



@include('layouts.register_service_form')



@endsection

