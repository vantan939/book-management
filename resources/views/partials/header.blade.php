<?php
	$fullname = '';
	if(Auth::check()) {
		$fullname = (empty(Auth::user()->firstName) && empty(Auth::user()->lastName)) 
		? Auth::user()->email 
		: Auth::user()->firstName. ' '. Auth::user()->lastName;
	}	
?>

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
					      	<li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
						        <a class="nav-link" href="{{route('home')}}">Book List</a>
					      	</li>
				     	 	<li class="nav-item {{ Route::is('my-book') ? 'active' : '' }}">
					        	<a class="nav-link" href="/my-book">My Book List</a>
					      	</li>
					      	<li class="nav-item {{ Route::is('book-creation') ? 'active' : '' }}">
					        	<a class="nav-link" href="/book-creation">Book Creation</a>
					      	</li>
					      	@if(Auth::check())
								<li class="nav-item">
						        	<a class="nav-link" href="{{route('log-out')}}">Logout</a>
						      	</li>
						      	<li class="nav-item">
						        	<span class="nav-link">Xin chào {{ $fullname }}!</span>
						      	</li>
					      	@else
					      		<li class="nav-item">
						        	<a class="nav-link" href="{{route('login')}}">Login</a>
						      	</li>
					      	@endif					      	
					    </ul>
				  	</div>
				</nav>
			</div>
		</div>
	</div>
</header>