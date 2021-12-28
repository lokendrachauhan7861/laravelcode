   <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Admin Pannel</a>
                <a class="navbar-brand hidden" href="./"><img src="{{ URL::asset('backed/images/logo2.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('admin/dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>

                    @can("isAllowed", collect(['userManagement']))  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>User Management</a>
                        <ul class="sub-menu children dropdown-menu">
                             @can("isAllowed", collect(['allUser']))
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('allUser') }}">All User</a></li>
                             @endcan
                        </ul>
                    </li>
                   @endcan
   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->