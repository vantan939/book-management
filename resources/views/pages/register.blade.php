@extends('user')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="app">
					<div class="user-form">
					    <form class="form-signin" autocomplete="off">
					        <h2 class="form-signin-heading">REGISTER</h2>
					        <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
					        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
					        <label class="checkbox"> <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe" /> Remember me </label>
					        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
					    </form>
					</div>
				</div>				
			</div>			
		</div>
	</div>
@endsection