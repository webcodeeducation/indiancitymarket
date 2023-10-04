@extends('layouts.master')
@section('content')


<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/news">News</a></li>

    

  </ol>

</nav>


@include('layouts.navigation_subresale')


<section class="container-fluid py-3">
<div class="row justify-content-center align-items-center">

<!--button id="change-button">CHANGE VW</button-->
<div class="outer-container">
<div id="eight-day-sticky-section-sticky-wrapper" class="sticky-wrapper">
  <div id="eight-day-sticky-section" class="sticky-section">
    <div class="scrollmenu-fade">
      <div class="scrollmenu">
        <!--p class="scroll-display-arrow">&gt;</p-->
        <a href="/postresaleproduct" class="active-highlight tour-details-section-active">Sell</a>
        @foreach($categories as $key=>$value)
          <a href="/resale/{{$value->id}}" class="active-highlight tour-details-section-active">{{$value->resale_category_name}}</a>
        @endforeach
        <!--p class="scroll-display-arrow">&lt;</p-->
      </div>
    </div>
  </div> 
</div>
</div>

</div>
</section>




<section class="container py-3">
  <div class="row">
    @foreach($products as $post)
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $post->title }}</h3>
                    <p class="text-muted">{{ $post->product_name }}</p>
                    <img class="img-fluid" src="{{ URL::asset('public/assets/resale/') }}/{{ $post->product_images }}">
                </div>
                <div class="card-body">
                    {{ substr($post->product_details, 0,  50) }}
                    <a href="/resalesubcategory/{{ $post->id }}" class="btn-block">Read More</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row justify-content-center align-items-center">
<div class="col-md-12">
{{ $products->links() }}
  </div>
</div>


</section>


@endsection

