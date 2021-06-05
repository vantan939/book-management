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
						        <a class="nav-link" href="{{route('home')}}">Books List</a>
					      	</li>

							@if(Auth::check()) <!-- Will check is Admin Later -->
								<li class="nav-item {{ Route::is('books-disabled-list') ? 'active' : '' }}">
									<a class="nav-link" href="{{route('books-disabled-list')}}">Books Disabled List</a>
								</li>
							@endif  

							@if(Auth::check())
								<li class="nav-item {{ Route::is('my-books') ? 'active' : '' }}">
									<a class="nav-link" href="/my-books">My Books List</a>
								</li>
								<li class="nav-item {{ Route::is('book-creation') ? 'active' : '' }}">
									<a class="nav-link" href="/book-creation">Book Creation</a>
								</li>
							@endif

					      	@if(Auth::check())
								<li class="nav-item">
						        	<a class="nav-link" href="{{route('log-out')}}">Logout</a>
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