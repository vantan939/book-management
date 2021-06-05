@extends('app')

@section('title','Books List')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div id="app">
				<books-list props-usertype="{{ $type_user }}" props-userid="{{ $id_user_current }}"></books-list>
			</div>				
		</div>			
	</div>
@endsection