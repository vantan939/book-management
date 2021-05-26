<header>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="logo">
					<a href="{{route('home')}}">BOOKING MANAGEMENT</a>
				</div>
			</div>
			<div class="col-md-9">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				  	<!-- <a class="navbar-brand" href="#">Navbar</a> -->
				  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
				  	</button>
				  	<div class="collapse navbar-collapse" id="navbarNav">
					    <ul class="navbar-nav">
					      	<li class="nav-item {{ Route::is('register') ? 'active' : '' }}">
						        <a class="nav-link" href="{{route('register')}}">Register</a>
					      	</li>
					      	<li class="nav-item {{ Route::is('login') ? 'active' : '' }}">
					        	<a class="nav-link" href="{{route('login')}}">Login</a>
					      	</li>	      
					    </ul>
				  	</div>
				</nav>
			</div>
		</div>
	</div>
</header>