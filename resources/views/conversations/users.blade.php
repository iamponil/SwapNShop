<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />
                <p id="current-user" data-current-user="{{ json_encode($currentUser) }}">{{$currentUser->name}}</p>
				<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
				<div id="status-options">
					<ul>
						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
					</ul>
				</div>
				<div id="expanded">
					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mikeross" />
					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="ross81" />
					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mike.ross" />
				</div>
			</div>
		</div>
<div id="search">
    <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
    <input type="text" id="searchInput" placeholder="Search contacts..." />
</div>
<div id="contacts">
	<ul>
		<!-- Display existing contacts -->
		@foreach ($users as $user)
		<li class="contact" id="user-{{ $user->id }}">
			<div class="wrap">
				<span class="contact-status online"></span>
				<img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
				<div class="meta">
					<!-- Add a data attribute with user ID to each list item -->
					<p class="name" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">{{ $user->name }}</p>
				</div>
			</div>
		</li>
		@endforeach

		<!-- Display searched users below existing contacts -->
		@if (isset($searchedUsers) && count($searchedUsers) > 0)
		@include('conversations.search')
		@endif
	</ul>
		
</div>
<div id="bottom-bar">
    <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
    
    <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
</div>
</div>
<div class="content">
    <div class="contact-profile">
        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
        <p id="selectedUserName">{{$users[0]->name}}</p>
    </div>
<script>
	$(document).ready(function () {
    // Initialize the selectedUserName with an empty string
    var selectedUserName = "";

    // Use event delegation to handle click events on .contact elements
    $('#contacts').on('click', '.contact', function () {
        // Get the user ID and user name from the data attributes
        var userId = $(this).find('.name').data('user-id');
        var userName = $(this).find('.name').data('user-name'); 
        var currentUserData = $('#current-user').data('current-user');
        var currentUser = currentUserData.id;
        // Update the content of the #selectedUserName element with the selected user's name
        $('#selectedUserName').text(userName);
        selectedUserName = userName;

        $.ajax({
            url: '/conversations/{from}/{to}',
            type: 'GET',
            data: { from: currentUser, to: userId },
            success: function (data) {
                console.log(data); 

                $('.messages').html(data);
            }
        });
    });
});
</script>