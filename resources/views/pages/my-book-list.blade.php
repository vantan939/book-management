@extends('app')

@section('title', 'My Book List')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="app">
					<my-book-list props-userid="{{ Auth::user()->id }}"></my-book-list>
				</div>				
			</div>			
		</div>
	</div>
@endsection