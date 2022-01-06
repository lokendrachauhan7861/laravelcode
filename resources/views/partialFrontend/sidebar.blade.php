<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					<li class="active"><a href="{{ route('userDashboard') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
					<li><a href="{{ route('profile') }}"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Change Password</a></li>
					<li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-cloud"></span> Logout</a></li>

					

					
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>