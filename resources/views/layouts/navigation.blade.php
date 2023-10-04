<nav class="navbar navbar-expand-md bg-navbar navbar-light pb-0">
  <!-- Brand -->
  <span class="text-warning m-lg-3"><img src="{{ URL::asset('public/assets/images/ICM_LOGO.png') }}" style="width: 40px;" class="img-fluid"></span><a class="navbar-brand pl-2 font-weight-bold" href="/"><span class="text-c1">INDIANCITY</span><span class="text-c2">MARKET</span></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto text-right mr-3">
      <li class="navbar-item px-3 border-left">

          <a class="nav-link" href="{{ route('login') }}" title="">LOGIN</a>

        </li>

        <li class="navbar-item px-3 border-left">

          <a class="nav-link" href="{{ route('register') }}" title="">SIGNUP</a>

        </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">CONTACT</a>
      </li>
    </ul>
  </div>
  <div class="row justify-content-around pt-2 no-gutters">
 <div class="col-lg-10 col-10"> 

  <div class="row no-gutters">
     <div class="col-6 col-lg-6">
      <form action="/search" method="get">
        {{csrf_field()}}
      <input class="form-control text-sm" type="text" name="query" placeholder="Search" aria-label="Search" value="">
      <input type="submit" name="submit" style="display: none;">
      </form>
     </div>
     <div class="col-5 col-lg-5 text-center overflow-hidden">
        <p class="font-weight-bold pb-0"><span></span>
          <form action="/city" method="POST">
            {{csrf_field()}}
          <select id="cars" class="btn-outline-success font-weight-bold btn py-2 text-sm" onchange="this.form.submit()">
            <option value="" {{  (session('city') == "Kurukshetra") ? "selected" : "" }}>Kurukshetra</option>
            <option value="Karnal" {{  (session('city') == "Karnal") ? "selected" : "" }}>Karnal</option>
            <option value="Rohtak" {{  (session('city') == "Rohtak") ? "selected" : "" }}>Rohtak</option>
            <option value="Kaithal" {{  (session('city') == "Kaithal") ? "selected" : "" }}>Kaithal</option>
          </select>
        </form>
        </p>
     </div>
     <div class="col-1 col-lg-1"><button class="btn btn-success btn-sm" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
     </div>
   </div>

  </div>
       <div class="col-lg-1 col-1"> <a href="/cart"><button class="btn btn-danger btn-sm  "><i class="fa fa-shopping-cart" aria-hidden="true"></i>
</button></a>
        </div>
  </div>

</nav>