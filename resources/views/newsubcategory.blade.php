@extends('layouts.master')
@section('content')


<nav aria-label="breadcrumb">

  <ol class="breadcrumb">

    <li class="breadcrumb-item active"><a href="/news">News</a></li>

    

  </ol>

</nav>


@include('layouts.navigation_subnews')




<section class="container py-3">



<div class="main-container container" id="main-container">

      <!-- Content -->
      <div class="row">
            
        <!-- post content -->
        <div class="col-lg-8 blog__content mb-72">
          <div class="content-box">           

            <!-- standard post -->
            <article class="entry mb-0">
              
              <div class="single-post__entry-header entry__header">
                <h1 class="single-post__entry-title">
                  {{ $news->news_title }}
                </h1>

                <div class="entry__meta-holder">
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <span>by</span>
                      <a href="#">{{$user->name}}</a>
                    </li>
                    <li class="entry__meta-date">
                      {{ $news->created_at }}
                    </li>
                  </ul>
                </div>
              </div> <!-- end entry header -->

              <div class="entry__img-holder">
                <img class="img-fluid" src="{{ URL::asset('public/assets/news/') }}/{{ $news->news_header }}">
              </div>

              <div class="entry__article-wrap">

                <!-- Share -->
                <div class="entry__share" style="position: relative;">
                  <div class="sticky-col" style="">
                    <div class="socials socials--rounded socials--large">
                      <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                        <i class="ui-facebook"></i>
                      </a>
                      <a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
                        <i class="ui-twitter"></i>
                      </a>
                      <a class="social social-google-plus" href="#" title="google" target="_blank" aria-label="google">
                        <i class="ui-google"></i>
                      </a>
                      <a class="social social-pinterest" href="#" title="pinterest" target="_blank" aria-label="pinterest">
                        <i class="ui-pinterest"></i>
                      </a>
                    </div>
                  </div>                  
                </div> <!-- share -->

                <div class="entry__article">
                           

                  {{ html_entity_decode($news->news_desc) }}

               


                </div> <!-- end entry article -->
              </div> <!-- end entry article wrap -->
                         

            </article> <!-- end standard post -->

          </div> <!-- end content box -->
        </div> <!-- end post content -->
        
        
      
      </div> <!-- end content -->
    </div>

    </section>

@endsection

