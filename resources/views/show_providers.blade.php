    <div class="container-fluid" style="background-color:#e8e8e8">
        <div class="container container-pad" id="property-listings">
            
            <div class="row">
              <div class="col-md-12">
                <h3>Services</h3>
                
              </div>
            </div>
            
            <div class="row">
            	@foreach($providers as $key=>$value)
                <div class="col-sm-6">

                <div class="search-job-listing brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">

						<a href="/serviceprovider/{{$value->id}}"><h2 class="job-title">{{$value->Organization_Name}}</h2></a>
						<span class="brf"><i>Organization Name : </i> {{$value->Organization_Name}} </span> &nbsp; | &nbsp; 
						<span class="brf"><i>Location :</i> {{$value->Location}}</span><br>
						<div class="search-brief brf"><i>Disability Served : </i>
						Developmental Disabilities</div>
						<div class="search-brief brf"><i>Category : </i>{{$value->service_provider_category}}</div>
						<div class="search-brief brf">Test</div>
						<span class="brf"><i>Posted by : </i>   {{$value->Posted_by}},{{ $diff = Carbon\Carbon::parse($value->created_at)->diffForHumans(Carbon\Carbon::now()) }}<br></span></div> 

                    <!-- Begin Listing: 609 W GRAVERS LN-->
                    <!--div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                        <div class="media">
                            <a class="pull-left" href="/serviceprovider/{{$value->id}}" target="_parent">
                            <img alt="image" class="img-responsive" src="{{ URL::asset('public/assets/images/providers')}}/{{$value->logo}}"></a>
                            <div class="media-body fnt-smaller">
                                <h4 class="media-heading">
                                  <a href="/serviceprovider/{{$value->id}}" target="_parent">{{$value->Organization_Name}} <small class="pull-right">{{$value->Location}}</small></a></h4>

                                  <p>Category: {{$value->Categories_offered}}</p>
                                  <p>Service Provider Type: {{$value->service_provider_type}}</p>
                                  <p>Category: {{$value->service_provider_category}}</p>
                                  <p>Establishment: {{$value->service_provider_category}}</p>
                                  <p></p>
                                
                                <p class="hidden-xs">{{ substr($value->company_desc, 0,  50) }}</p><span class="fnt-smaller fnt-lighter fnt-arial">Posted by: {{$value->Posted_by}}</span>
                            </div>
                        </div>
                    </div--><!-- End Listing-->

                </div>
                @endforeach


            </div><!-- End row -->
        </div><!-- End container -->
    </div>