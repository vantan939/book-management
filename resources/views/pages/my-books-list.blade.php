@extends('app')

@section('title', 'My Books List')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="app">
					<my-books-list props-userid="{{ Auth::user()->id }}"></my-books-list>
				</div>				
			</div>			
		</div>
	</div>
@endsection