<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') | {{ config('app.name', 'Booking Management') }}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
	@includeIf('partials.header')
	@includeIf('partials.user-info')

	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12 title-page">
					<h2>@yield('title')</h2>
				</div>
			</div>

			@yield('content')
		</div>
	</div>

	@includeIf('partials.footer')
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>