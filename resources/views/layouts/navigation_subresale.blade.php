<section class="container-fluid py-3">
<div class="row justify-content-center align-items-center">
<div class="outer-container">
<div id="eight-day-sticky-section-sticky-wrapper" class="sticky-wrapper">
  <div id="eight-day-sticky-section" class="sticky-section">
    <div class="scrollmenu-fade">
      <div class="scrollmenu">
        <a target="_blank" href="/postresaleproduct" class="active-highlight tour-details-section-active">Sell</a>
        @foreach($categories as $key=>$value)
          <a href="/resale/{{$value->id}}" class="active-highlight tour-details-section-active">{{$value->resale_category_name}}</a>
        @endforeach
      </div>
    </div>
  </div> 
</div>
</div>

</div>
</section>