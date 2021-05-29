@extends('app')

@section('title','Book List')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div id="app">
				<book-list props-usertype="{{ $type_user }}" props-userid="{{ $id_user_current }}"></book-list>
			</div>				
		</div>			
	</div>
@endsection