@extends('layouts.master')
 
@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ URL::asset('public/assets/images/hero_2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Happy Buying Online</h1>
                <p class="mb-0">{{$shop->shop_name}}</p>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            
            <div class="mb-4" style="margin-top: -150px;">
              <div class="slide-one-item home-slider owl-carousel">
               
                <div><img src="{{ URL::asset('public/assets/geeta_jyanti/shop_images') }}/{{$shop->shop_image}}" alt="Image" class="img-fluid rounded"></div>
              </div>
              
            </div>
            <h4 class="h3 mb-4 text-black">{{$shop->shop_name}}</h4>
            <p class="mt-3">{{$shop->shop_address}}</p>
            <p class="mt-3">{{$shop->shop_phone}}</p>

            

            <h4 class="h5 mb-4 text-black">Description</h4>
            International Gita Mahotsav 2019 held in Kurukshetra from 23rd November to 10th December.

            <p class="mt-3"><a href="tel:+{{$shop->shop_phone}}" class="btn btn-primary">Get In Touch</a></p>

          </div>
          <div class="col-lg-3 ml-auto">

            <div class="mb-5">
              <h3 class="h5 text-black mb-3">Search</h3>
              <form action="/search" method="get">
                {{csrf_field()}}
                <div class="form-group">
                  <input type="text" placeholder="What are you looking for?" name="location" class="form-control">
                </div>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="catgory" id="">
                        <option value="">All Categories</option>
                        @foreach($categories as $key=>$value)
                        <option value="{{$value->id}}">{{$value->category_name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                </div>
                <div class="form-group">
                  <!-- select-wrap, .wrap-icon -->
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <input type="text" name="location" placeholder="Location" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <p>Radius around selected destination</p>
                </div>
                <div class="form-group">
                  <input type="range" min="0" max="100" value="20" data-rangeslider>
                </div>
                <input type="submit" class="btn btn-primary" value="Search">
              </form>
            </div>
            
            
            <!--div class="mb-5">
              <form action="#" method="post">
                <div class="form-group">
                  <p>Category 'Real Estate' is selected</p>
                  <p>More filters</p>
                </div>
                <div class="form-group">
                  <ul class="list-unstyled">
                    <li>
                      <label for="option1">
                        <input type="checkbox" id="option1">
                        Residential
                      </label>
                    </li>
                    <li>
                      <label for="option2">
                        <input type="checkbox" id="option2">
                        Commercial
                      </label>
                    </li>
                    <li>
                      <label for="option3">
                        <input type="checkbox" id="option3">
                        Industrial
                      </label>
                    </li>
                    <li>
                      <label for="option4">
                        <input type="checkbox" id="option4">
                        Land
                      </label>
                    </li>
                  </ul>
                </div>
              </form>
            </div-->

            <div class="mb-5">
              <h3 class="h6 mb-3">More Info</h3>
              <p>Gita Jayanti is the birthday of Bhagavad Gita, the sacred text of Hindus. It's celebrated on the Shukla Ekadashi, 11th day of waxing moon of Margashirsha month of the Hindu calendar.</p>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 text-left border-primary">
            <h2 class="font-weight-light text-primary">Trending Today</h2>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-6">

            <div class="d-block d-md-flex listing">
              <a href="#" class="img d-block" style="background-image: url('{{ URL::asset('public/assets/images/img_2.jpg') }}')"></a>
              <div class="lh-content">
                <span class="category">Real Estate</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="#">House with Swimming Pool</a></h3>
                <address>Don St, Brooklyn, New York</address>
                <p class="mb-0">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span class="review">(3 Reviews)</span>
                </p>
              </div>
            </div>
            <div class="d-block d-md-flex listing">
                <a href="#" class="img d-block" style="background-image: url('{{ URL::asset('public/assets/images/img_3.jpg') }}')"></a>
                <div class="lh-content">
                  <span class="category">Furniture</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="#">Wooden Chair &amp; Table</a></h3>
                  <address>Don St, Brooklyn, New York</address>
                  <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p>
                </div>
              </div>

              <div class="d-block d-md-flex listing">
                <a href="#" class="img d-block" style="background-image: url('{{ URL::asset('public/assets/images/img_4.jpg') }}')"></a>
                <div class="lh-content">
                  <span class="category">Electronics</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="#">iPhone X gray</a></h3>
                  <address>Don St, Brooklyn, New York</address>
                  <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p>
                </div>
              </div>

             

          </div>
          <div class="col-lg-6">

            <div class="d-block d-md-flex listing">
              <a href="#" class="img d-block" style="background-image: url('{{ URL::asset('public/assets/images/img_1.jpg') }}')"></a>
              <div class="lh-content">
                <span class="category">Cars &amp; Vehicles</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="#">Red Luxury Car</a></h3>
                <address>Don St, Brooklyn, New York</address>
                <p class="mb-0">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span class="review">(3 Reviews)</span>
                </p>
              </div>
            </div>

            <div class="d-block d-md-flex listing">
              <a href="#" class="img d-block" style="background-image: url('{{ URL::asset('public/assets/images/img_2.jpg') }}')"></a>
              <div class="lh-content">
                <span class="category">Real Estate</span>
                <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                <h3><a href="#">House with Swimming Pool</a></h3>
                <address>Don St, Brooklyn, New York</address>
                <p class="mb-0">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-secondary"></span>
                  <span class="review">(3 Reviews)</span>
                </p>
              </div>
            </div>
            <div class="d-block d-md-flex listing">
                <a href="#" class="img d-block" style="background-image: url('{{ URL::asset('public/assets/images/img_3.jpg') }}')"></a>
                <div class="lh-content">
                  <span class="category">Furniture</span>
                  <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                  <h3><a href="#">Wooden Chair &amp; Table</a></h3>
                  <address>Don St, Brooklyn, New York</address>
                  <p class="mb-0">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-secondary"></span>
                    <span class="review">(3 Reviews)</span>
                  </p>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section bg-white">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Testimonials</h2>
          </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-3">
                <p>John Smith</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>
          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-3">
                <p>Christine Aguilar</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/person_4.jpg" alt="Image" class="img-fluid mb-3">
                <p>Robert Spears</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>

          <div>
            <div class="testimonial">
              <figure class="mb-4">
                <img src="images/person_5.jpg" alt="Image" class="img-fluid mb-3">
                <p>Bruce Rogers</p>
              </figure>
              <blockquote>
                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
              </blockquote>
            </div>
          </div>

        </div>
      </div>
    </div>


@endsection