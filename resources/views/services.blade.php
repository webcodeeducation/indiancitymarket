@extends('layouts.master')
@section('content')

<style>
a {
    color: #03a1d1;
    text-decoration: none!important;
}

/**** LAYOUT ****/
.list-inline>li {
    padding: 0 10px 0 0;
}
.container-pad {
    padding: 30px 15px;
}


/**** MODULE ****/
.bgc-fff {
    background-color: #fff!important;
}
.box-shad {
    -webkit-box-shadow: 1px 1px 0 rgba(0,0,0,.2);
    box-shadow: 1px 1px 0 rgba(0,0,0,.2);
}
.brdr {
    border: 1px solid #ededed;
}

/* Font changes */
.fnt-smaller {
    font-size: .9em;
}
.fnt-lighter {
    color: #bbb;
}

/* Padding - Margins */
.pad-10 {
    padding: 10px!important;
}
.mrg-0 {
    margin: 0!important;
}
.btm-mrg-10 {
    margin-bottom: 10px!important;
}
.btm-mrg-20 {
    margin-bottom: 20px!important;
}

/* Color  */
.clr-535353 {
    color: #535353;
}




/**** MEDIA QUERIES ****/
@media only screen and (max-width: 991px) {
    #property-listings .property-listing {
        padding: 5px!important;
    }
    #property-listings .property-listing a {
        margin: 0;
    }
    #property-listings .property-listing .media-body {
        padding: 10px;
    }
}

@media only screen and (min-width: 992px) {
    #property-listings .property-listing img {
        max-width: 180px;
    }
}
  </style>

<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/services">Services</a></li>

    

  </ol>

</nav>



<section class="container-fluid py-3">
<div class="row justify-content-center align-items-center">

<div class="outer-container">
<div id="eight-day-sticky-section-sticky-wrapper" class="sticky-wrapper">
  <div id="eight-day-sticky-section" class="sticky-section">
    <div class="scrollmenu-fade">
      <div class="scrollmenu">
        <a class="active-highlight tour-details-section-active" href="/serviceprovider/add">Add New Service</a>
        @foreach($categories as $key=>$value)
          <a href="{{$value->service_cat_name}}" class="active-highlight tour-details-section-active">{{$value->service_cat_name}}</a>
        @endforeach
      </div>
    </div>
  </div> 
</div>
</div>

</div>
</section>











@include('show_providers')

@endsection

