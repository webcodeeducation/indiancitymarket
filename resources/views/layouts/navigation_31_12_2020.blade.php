<nav class="navbar navbar-expand-lg py-3 shadow-lg">

    <a href="/" class="navbar-brand pl-4 pl-md-5 text-success" title="best web designing company" >
      <img src="{{ URL::asset('public/assets/images/ICM_LOGO.png') }}" width="50px"/></a>

    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#menu_button">

        <div class="animated-icon3"><span></span><span></span><span></span><span></span></div>

      </button>

    <div class="collapse navbar-collapse text-right p-right" id="menu_button">



      <ul class="navbar-nav ml-auto  text-right">

        <li class="navbar-item mx-2 ml-lg-5 pl-lg-5">

          <a class="nav-link text-dark" title="" href="/">HOME</a>

        </li>

        <!--li class="navbar-item px-3 border-left">

          <a class="nav-link text-dark" href="city.php" title="">CITY</a>

        </li-->

        <li class="navbar-item px-3 border-left">

          <a class="nav-link text-dark" href="{{ route('login') }}" title="">LOGIN</a>

        </li>

        <li class="navbar-item px-3 border-left">

          <a class="nav-link text-dark" href="{{ route('register') }}" title="">SIGNUP</a>

        </li>

        <!--li class="navbar-item px-3 border-left">

          <a class="nav-link text-dark" href="/services" title="">SERVICES</a>

        </li>

        <li class="navbar-item px-3 border-left">

          <a class="nav-link text-dark" href="/shopping" title="">SHOPPING</a>

        </li>

        <li class="navbar-item px-3 border-left">
          <a class="nav-link text-dark" href="/resale" title="">RESALE</a>
        </li>
        <li class="navbar-item px-3 border-left">
          <a class="nav-link text-dark" href="/news" title="">NEWS</a>
        </li-->
        <li class="navbar-item px-3 border-left">
          <a class="nav-link text-dark" href="/contact" title="">CONTACT</a>
        </li>
        <li class="navbar-item px-3 border-left">
          <form action="/city" method="POST">
            {{csrf_field()}}
        <select id="city" class="btn-warning font-weight-bold btn" name="city" onchange="this.form.submit()">
  <option value="Kurukshetra" {{  (session('city') == "Kurukshetra") ? "selected" : "" }}>Kurukshetra</option>
  <option value="Karnal" {{  (session('city') == "Karnal") ? "selected" : "" }}>Karnal</option>
  <option value="Rohtak" {{  (session('city') == "Rohtak") ? "selected" : "" }}>Rohtak</option>
  <option value="Kaithal" {{  (session('city') == "Kaithal") ? "selected" : "" }}>Kaithal</option>
</select>
</form>
        </li>

      </ul>

      <ul class="navbar-nav list-inline ml-2 font-weight-bold">

      <center>

      <li class="navbar-item cart-button cart_item"> 

        <!-- <button type="button" class="btn btn-danger px-5" data-target="#login-modal" data-toggle="modal">Login</button> 

        <button type="button" class="btn btn-danger px-5" data-target="#signup-modal" data-toggle="modal">Signup</button> -->

        <a href="/cart" class="icontext">

                                <div class="icon-wrap icon-xs bg2 round text-secondary"><i

                                        class="fa fa-shopping-cart"></i></div>

                                <div class="text-wrap">

                                    <small>{{ $cartCount }} items</small>

                                </div>

                            </a>


      </li>   

    </center>

    </ul>

    </div>

  </nav>