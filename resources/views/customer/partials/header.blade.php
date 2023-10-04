	<div class="wrapper">

		<header class="main-header">

			<a href="/admin" class="logo">
				<span class="logo-lg">IndianCityMarket</span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li>
							<a href="/" target="_blank">Visit Website</a>
						</li>

						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- <img src="{{ URL::asset('public/assets/images/avatar.jpg') }}" class="user-image" alt="user photo"> -->
								<img src="{{ URL::asset('public/assets/images/profile') }}/{{$user->user_profile}}" class="user-image" alt="user photo">
								<span class="hidden-xs"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="/profile" class="btn btn-default btn-flat">Edit Profile</a>
									</div>
									<div>
										<a href="/logout" class="btn btn-default btn-flat">Log out</a>
									</div>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>

			</nav>
		</header>

  		
  		<aside class="main-sidebar">
    		<section class="sidebar">

     
      			<ul class="sidebar-menu">

			        <li class="treeview active">
			          <a href="/customer">
			            <i class="fa fa-laptop"></i> <span>Dashboard</span>
			          </a>
			        </li>
			        <li class="treeview ">
			          <a href="/customer/shop">
			            <i class="fa fa-cog"></i> <span>Shop</span>
			          </a>
			        </li>
			        <li class="treeview ">
			          <a href="/customer/service/create">
			            <i class="fa fa-cog"></i> <span>Services</span>
			          </a>
			        </li>
			        <li class="treeview ">
			          <a href="/customer/resale/create">
			            <i class="fa fa-cog"></i> <span>Resale</span>
			          </a>
			        </li>
			        <li class="treeview ">
			          <a href="/customer/news/create">
			            <i class="fa fa-cog"></i> <span>News</span>
			          </a>
			        </li>
			        <li class="treeview ">
			          <a href="/customer/fungame/create">
			            <i class="fa fa-cog"></i> <span>Photo</span>
			          </a>
			        </li>
			            <li class="treeview ">
			          <a href="/customer/shop">
			            <i class="fa fa-cog"></i> <span>Like</span>
			          </a>
			        </li>

			            <li class="treeview ">
			          <a href="/customer/shop">
			            <i class="fa fa-cog"></i> <span>Dislike</span>
			          </a>
			        </li>

      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper"><section class="content-header">
  <!--h1>Dashboard</h1-->
</section>