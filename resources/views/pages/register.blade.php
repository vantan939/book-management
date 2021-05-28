@extends('user')

@section('title', 'Register')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="app">
					<div class="user-form">
					    <form class="form-signin" autocomplete="off" method="post">
					    	@csrf
					        <h2 class="form-signin-heading">REGISTER</h2>
					        <div class="form-group">
					        	<input type="email" class="form-control" name="username" placeholder="Email Address" />
					        	{!!$errors->first("username", "<span class='text-danger'>:message</span>")!!}
					        </div>
					        <div class="form-group">
					        	<input type="password" class="form-control" name="password" placeholder="Password" />
					        	{!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
					        </div>
					        <div class="form-group">
					        	<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" />
					        	{!!$errors->first("confirm_password", "<span class='text-danger'>:message</span>")!!}
					        </div>
					       
					        @if(Session::has('success'))
                            	<div class="alert alert-success alert-dismissible">
	                                <button type="button" class="close" data-dismiss="alert">×</button>
	                                {{Session::get('success')}}
	                            </div>
	                        @elseif(Session::has('failed'))
	                            <div class="alert alert-danger alert-dismissible">
	                                <button type="button" class="close" data-dismiss="alert">×</button>
	                                {{Session::get('failed')}}
	                            </div>
	                        @endif

					        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
					    </form>
					</div>
				</div>				
			</div>			
		</div>
	</div>
@endsection