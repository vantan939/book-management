@if(!isGuest())
    <div class="user-info">
        <div class="container">
            <div class="user-name">Hello {{ getFullName() }}!</div>
        </div>
    </div>    		
@endif