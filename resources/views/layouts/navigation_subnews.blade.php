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