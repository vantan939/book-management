@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 title-page">
				<h2>BOOK CREATION</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="app">
					<book-creation props-userid="{{ Auth::user()->id }}"></book-creation>
				</div>				
			</div>			
		</div>
	</div>
@endsection