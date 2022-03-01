
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" />

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Dashboard
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
		
			<ul class="nav navbar-nav navbar-right">
				<li style="margin-top:12px;">
					
					
                 {{ Cart::getTotalQuantity()}}
                 <i style="font-size:24px" class="fa">&#xf07a;</i>

				@if(Session::get('authSessData')['pic'])
                   <img src="{{ url('/uploads/'. Session::get('authSessData')['pic']) }}" class="rounded-circle" alt="Cinque Terre" width="40" height="30">
			    @else
			       <img src="{{ url('/uploads/default-img/default.png') }}" class="rounded-circle" alt="Cinque Terre" width="40" height="30">
				@endif
				</li>
				<li><a href="http://www.pingpong-labs.com" target="_blank">@if(Session::has('authSessData'))
               {{ Session::get('authSessData')['name'] }}
               @endif</a></li>
				
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav> 