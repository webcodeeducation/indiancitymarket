<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://khushimarriagebeauro.com/admin">
                <img src="http://placehold.it/200x50&text=KhushiMarriageBeauro" alt="KhushiMarriageBeauro">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="/" target="_blank">Visit Site
                </a>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/admin/profile"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="/admin/changepassword"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> Shop <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="/admin/addproduct"><i class="fa fa-angle-double-right"></i> Add Product</a></li>
                        <li><a href="/admin/products"><i class="fa fa-angle-double-right"></i> All Products</a></li>
                        <!--li><a href="/admin/customers/edit"><i class="fa fa-angle-double-right"></i> Edit Details</a></li-->
                        <li><a href="/admin/newcustomers"><i class="fa fa-angle-double-right"></i> New Customers</a></li>
                        <li><a href="/admin/featuredcustomers"><i class="fa fa-angle-double-right"></i> Featured Customers</a></li>
                        <li><a href="/admin/blockedcustomers"><i class="fa fa-angle-double-right"></i> Block Customers</a></li>
                        <li><a href="/admin/contactrequests"><i class="fa fa-angle-double-right"></i> Contact Requests</a></li>
                        <li><a href="/admin/updateplans"><i class="fa fa-angle-double-right"></i> Customer Plans</a></li>
                        <li><a href="/admin/plans"><i class="fa fa-angle-double-right"></i> Plans</a></li>
                        <li><a href="/admin/photos"><i class="fa fa-angle-double-right"></i> Photos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  Grocery <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                    	<li><a href="/admin/shoplists"><i class="fa fa-angle-double-right"></i> Shops</a></li>
                        <li><a href="/admin/showcustomers"><i class="fa fa-angle-double-right"></i> Customers</a></li>
                        <li><a href="/admin/showorders"><i class="fa fa-angle-double-right"></i> Orders</a></li>
                        <li><a href="/admin/groceryitems"><i class="fa fa-angle-double-right"></i> Show Items</a></li>
                        <li><a href="/admin/groceryconfig"><i class="fa fa-angle-double-right"></i> Grocery Config</a></li>
                        <li><a href="/admin/addbanners"><i class="fa fa-angle-double-right"></i> Add Banners</a></li>
                        <li><a href="/admin/addsliders"><i class="fa fa-angle-double-right"></i> Add Sliders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  Staffs <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="/admin/showstaffs"><i class="fa fa-angle-double-right"></i> Show Staffs</a></li>
                        <li><a href="/admin/leaves"><i class="fa fa-angle-double-right"></i> Leaves</a></li>
                        <li><a href="/admin/payments"><i class="fa fa-angle-double-right"></i> Payments</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-users"><i class="fa fa-fw fa-star"></i>  Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-users" class="collapse">
                        <li><a href="/admin/users"><i class="fa fa-angle-double-right"></i> All Users</a></li>
                        <li><a href="/admin/add/user"><i class="fa fa-angle-double-right"></i> Add User</a></li>
                    </ul>
                </li>
                <li>
                    <a href="investigaciones/favoritas"><i class="fa fa-fw fa-user-plus"></i>  Add Slider(Mobile App)</a>
                </li>
                <li>
                    <a href="sugerencias"><i class="fa fa-fw fa-paper-plane-o"></i> Grocery Slider(Mobile App)</a>
                </li>
                <li><a href="/admin/addproduct"><i class="fa fa-angle-double-right"></i> Add Product</a></li>
                <li><a href="/admin/resale/products"><i class="fa fa-angle-double-right"></i> Resale Products</a></li>
                <li><a href="/admin/homephotos"><i class="fa fa-angle-double-right"></i> Home Photos</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    
<!--div class="row">
    <div class="absolute-wrapper"> </div>
    <div class="side-menu">
        <nav class="navbar navbar-default" role="navigation">
            <div class="side-menu-container">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/admin"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="/admin/shops"><span class="glyphicon glyphicon-plane"></span> Shops</a></li>
                    <li><a href="/admin/createads"><span class="glyphicon glyphicon-cloud"></span>Create Ads</a></li>
                    <li><a href="/admin/createjyantiads"><span class="glyphicon glyphicon-cloud"></span>Jyanti Ads</a></li>
                    <li><a href="/admin/categories"><span class="glyphicon glyphicon-cloud"></span>Category</a></li>
                    <li><a href="/admin/subcategories"><span class="glyphicon glyphicon-cloud"></span> SubCategory</a></li>
					<li><a href="/admin/products"><span class="glyphicon glyphicon-cloud"></span> Products</a></li>
                    <li><a href="/admin/users"><span class="glyphicon glyphicon-cloud"></span> Users</a></li>
					<li><a href="/admin/globalsettings"><span class="glyphicon glyphicon-cloud"></span> Settings</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Global Data</a></li>
                </ul>
            </div>
        </nav>

    </div>
</div-->