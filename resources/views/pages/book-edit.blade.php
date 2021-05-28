@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 title-page">
				<h2>BOOK EDIT</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="app">
					<book-edit
                        props-id="{{ $data['id'] }}"
                        props-title="{{ $data['title'] }}"
                        props-author="{{ $data['author'] }}"
                        props-description="{{ $data['description'] }}"
                        props-enabled="{{ $data['enabled'] }}"
                    ></book-edit>
				</div>				
			</div>			
		</div>
	</div>
@endsection