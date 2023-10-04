@extends('layouts.master')
@section('content')





<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/postnews">Post News</a></li>

    

  </ol>

</nav>


@include('layouts.navigation_subnews')
@include('newsform')

@endsection

