@extends('layouts.master')
@section('content')


<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/news">News</a></li>

    

  </ol>

</nav>


@include('layouts.navigation_subnews')


<section class="container-fluid py-3">
<div class="row justify-content-center align-items-center">

<!--button id="change-button">CHANGE VW</button-->
<div class="outer-container">
<div id="eight-day-sticky-section-sticky-wrapper" class="sticky-wrapper">
  <div id="eight-day-sticky-section" class="sticky-section">
    <div class="scrollmenu-fade">
      <div class="scrollmenu">
        <!--p class="scroll-display-arrow">&gt;</p-->
        <a href="/postnews" class="active-highlight tour-details-section-active">Post News</a>
        @foreach($categories as $key=>$value)
          <a href="/news/{{$value->id}}" class="active-highlight tour-details-section-active">{{$value->news_category_name}}</a>
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
    @foreach($news as $post)
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $post->title }}</h3>
                    <p class="text-muted">{{ $post->news_title }}</p>
                    <img class="img-fluid" src="{{ URL::asset('public/assets/news/') }}/{{ $post->news_header }}">
                </div>
                <div class="card-body">
                    {{ substr($post->news_desc, 0,  50) }}
                    <a href="/newsubcategory/{{ $post->id }}" class="btn-block">Read More</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row justify-content-center align-items-center">
<div class="col-md-12">
{{ $news->links() }}
  </div>
</div>


</section>


@endsection

