<?php
	$fullname = '';
	if(Auth::check()) {
		$fullname = (empty(Auth::user()->firstName) && empty(Auth::user()->lastName)) 
		? Auth::user()->email 
		: Auth::user()->firstName. ' '. Auth::user()->lastName;
	}	
?>

@if(Auth::check())
    <div class="user-info">
        <div class="container">
            <div class="user-name">Hello {{ $fullname }}!</div>
        </div>
    </div>    		
@endif