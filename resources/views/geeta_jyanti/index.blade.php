@extends('layouts.master')
@section('content')


<section class="container-fluid py-2">

     <p class="content text-danger"> Shops in Geeta Jayanti (2020)

        </p>

      

    <div class="row justify-content-center align-items-center">

      

      <div class="col-6 py-2 col-md-3 mx-auto text-center">

        <a href="toys.php">

        <button class="btn btn-lg btn-success px-5 py-3 btn-block"> Toys</button>   

          </a>

      </div>

      <div class="col-6 py-2 col-md-3 mx-auto text-center">

        <a href="">

        <button class="btn btn-lg btn-success px-5 py-3 btn-block">Eatables</button>    

          </a>

      </div>

      <div class="col-6 py-2 col-md-3 mx-auto text-center">

        <a href="">

        <button class="btn btn-lg btn-success px-5 py-3 btn-block">Glass Items</button>   

          </a>

      </div>

      <div class="col-6 py-2 col-md-3 mx-auto text-center">

        <a href="">

        <button class="btn btn-lg btn-success px-5 py-3 btn-block">Jwellery</button>    

          </a>

      </div>

      <div class="col-6 py-2 col-md-3 mx-auto text-center">

        <a href="">

        <button class="btn btn-lg btn-success px-5 py-3 btn-block">Pardarshani</button>   

          </a>

      </div>

      <div class="col-6 py-2 col-md-3 mx-auto text-center">

        <a href="">

        <button class="btn btn-lg btn-success px-5 py-3 btn-block">Pardarshani</button>   

          </a>

      </div>

    </div>

  </section>
  

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ URL::asset('public/assets/images/hero_2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Geeta Jyanti Shops</h1>
                <p class="mb-0">Here you can find all shops that are avaialabel in Geeta Jyanti Shops</p>
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

            <div class="row">
              @foreach($shops as $key2=>$value2)
              <div class="col-lg-6">
                
                <div class="d-block d-md-flex listing vertical">
                  <a href="/GeetaJyanti/shop/{{$value2->id}}?_token={{csrf_token()}}" class="img d-block" style="background-image: url('{{ URL::asset('public/assets/geeta_jyanti/shop_images') }}/{{$value2->shop_image}}')"></a>
                  <div class="lh-content">
                    <span class="category">{{$value2->shop_number}}</span>
                    <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                    <h3><a href="/GeetaJyanti/shop/{{$value2->id}}?_token={{csrf_token()}}">{{$value2->shop_name}}</a></h3>
                    <address>{{$value2->shop_phone}}, {{$value2->shop_address}}</address>
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
              @endforeach
              
              


              

            </div>

            <div class="col-12 mt-5 text-center">
              <div class="custom-pagination">
                <!--span>1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <span class="more-page">...</span>
                <a href="#">10</a-->
                  {{ $shops->links() }}
              </div>
            </div>

          </div>
          <div class="col-lg-3 ml-auto">

            <div class="mb-5">
              <h3 class="h5 text-black mb-3">Filters</h3>
              <form action="#" method="post">
                <div class="form-group">
                  <input type="text" placeholder="What are you looking for?" class="form-control">
                </div>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="" id="">
                        <option value="">All Categories</option>
                        <option value="" selected="">Real Estate</option>
                        <option value="">Books &amp;  Magazines</option>
                        <option value="">Furniture</option>
                        <option value="">Electronics</option>
                        <option value="">Cars &amp; Vehicles</option>
                        <option value="">Others</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <!-- select-wrap, .wrap-icon -->
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <input type="text" placeholder="Location" class="form-control">
                  </div>
                </div>
              </form>
            </div>
            
            <div class="mb-5">
              <form action="#" method="post">
                <div class="form-group">
                  <p>Radius around selected destination</p>
                </div>
                <div class="form-group">
                  <input type="range" min="0" max="100" value="20" data-rangeslider>
                </div>
              </form>
            </div>

            <div class="mb-5">
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
            </div>

            <div class="mb-5">
              <h3 class="h6 mb-3">More Info</h3>
              <p>Here you can find all shops which are opened in Geeta Jyanti Kurukshetra</p>
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
              <a href="#" class="img d-block" style="background-image: url('images/img_2.jpg')"></a>
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
                <a href="#" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>
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
                <a href="#" class="img d-block" style="background-image: url('images/img_4.jpg')"></a>
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
              <a href="#" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>
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
              <a href="#" class="img d-block" style="background-image: url('images/img_2.jpg')"></a>
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
                <a href="#" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>
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
            <div class="mynav">
                        {{ $shops->links() }}
                      </div>
          </div>
        </div>

        
      </div>
    </div>



@endsection