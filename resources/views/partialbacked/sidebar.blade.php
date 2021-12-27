   <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Arp Pannel</a>
                <a class="navbar-brand hidden" href="./"><img src="{{ URL::asset('backed/images/logo2.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('admin/dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>

                    @can("isAllowed", collect(['all_user','create_role','view_permission']))  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>User Management</a>
                        <ul class="sub-menu children dropdown-menu">
                             @can("isAllowed", collect(['view_user']))
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('userchat') }}">All User</a></li>
                             @endcan
                              @can("isAllowed", collect(['create_role']))
                            <li><i class="fa fa-puzzle-piece"></i><a href="#">User Role</a></li>
                               @endcan
                            @can("isAllowed", collect(['view_permission']))
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('viewPermission') }}">User Permission</a></li>
                              @endcan

                           
                        </ul>
                    </li>
                   @endcan

                    @can("isAllowed", collect(['websiteManagement']))
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Website Logo</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('admin/add/logo') }}">Add Logo</a></li>
                            <li><i class="fa fa-id-badge\"></i><a href="{{ url('admin/view/logo') }}">View Logo</a></li>

                           
                        </ul>
                    </li>
                    @endcan
                    @can("isAllowed", collect(['productManagement']))
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('add_product') }}">Add Product</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ route('viewproduct') }}">Product List</a></li>
                           <!--  <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Permission</a></li> -->

                           
                        </ul>
                    </li>
                      @endcan
                    @can("isAllowed", collect(['packageManagement']))
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Combo Packages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('admin/add/package') }}">Add Packages</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('admin/view/package') }}">Packages List</a></li>
                           <!--  <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Permission</a></li> -->

                           
                        </ul>
                    </li>
                     @endcan
                       @can("isAllowed", collect(['testimonials']))
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Testimonials</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('admin/add/testimonial') }}">Add Testimonials</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('admin/view/testimonial') }}">Testimonials List</a></li>
                           <!--  <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Permission</a></li> -->

                           
                        </ul>
                    </li>
                     @endcan

                    @can("isAllowed", collect(['clientLogo']))
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Clients Logo</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('admin/add/clientlogo') }}">Add Clients</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('admin/view/clientlogo') }}">Clients List</a></li>

                           
                        </ul>
                    </li>
                     @endcan

                       @can("isAllowed", collect(['portfolio']))
                  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Portfolio</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('admin/add/portfolio') }}">Add Portfolio</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('admin/view/portfolio') }}">Portfolio List</a></li>
                           <!--  <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Permission</a></li> -->

                           
                        </ul>
                    </li>
                     @endcan

                     @can("isAllowed", collect(['banner']))
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Banner</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('admin/add/banner') }}">Add Banner</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('admin/view/banner') }}">Banner List</a></li>
                           <!--  <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Permission</a></li> -->

                           
                        </ul>
                    </li>
                     @endcan
                       
                      @can("isAllowed", collect(['couponManagement']))
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Coupon Management</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url('admin/add/coupon') }}">Add Coupon</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('admin/view/coupon') }}">Coupon List</a></li>
                           
                        </ul>
                    </li>
                     @endcan
                     
                       @can("isAllowed", collect(['payment']))
                       
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Payment</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="{{ url('admin/view/payment') }}">View Payment</a></li>

                           
                        </ul>
                    </li>
                     @endcan

                     

                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->