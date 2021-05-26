@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 title-page">
				<h2>MY BOOK LIST</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="app">
					<mybooklist props-userid="{{ Auth::user()->id }}" />
				</div>				
			</div>			
		</div>
	</div>
@endsection