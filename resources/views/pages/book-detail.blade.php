@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 title-page">
				<h2>{{ $data['title'] }}</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="app">
					<book-detail
						props-author="{{ $data['author'] }}"
                        props-description="{{ $data['description'] }}"
					></book-detail>
				</div>				
			</div>			
		</div>
	</div>
@endsection