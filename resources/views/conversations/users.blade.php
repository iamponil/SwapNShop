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
		@foreach($conversations as $conversation)
    <li class="contact" id="user-{{ $conversation->current_user_id }}">
        <div class="wrap">
            <span class="contact-status online"></span>
            <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
            <div class="meta">
                <p class="name" data-user-id="{{ $conversation->other_user_id }}" data-user-name="{{ $conversation->other_user_name }}">{{ $conversation->conversation_name }}</p>
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
        <p id="selectedUserName"></p>
    </div>
    <div class="message-input">
        <div class="wrap">
            @if(isset($userId))
            <form action="{{ route('conversations.sendMessage', ['from' => $currentUser->id, 'to' => $userId]) }}" method="post">
                @csrf
                <input type="text" name="content" placeholder="Write your message..." />
                <button type="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
             @endif
        </div>
</div>
<script>
   	$(document).ready(function () {
		$('#searchInput').on('input', function () {
			var searchText = $(this).val();
			
			$.ajax({
				url: '/search-conversations',
				type: 'GET',
				data: { searchText: searchText },
				success: function (data) {
					$('#contacts ul').html(data);
				}
			});
		});
	});
  
    $(document).ready(function () {
    var selectedUserName = "";
    
    var messageForm = $('#message-form');

    $('#contacts').on('click', '.contact', function () {
        var userId = $(this).find('.name').data('user-id');
        var userName = $(this).find('.name').data('user-name'); 
        var currentUserData = $('#current-user').data('current-user');
        var currentUser = currentUserData.id;

        $('#selectedUserName').text(userName);
        selectedUserName = userName;
        $.ajax({
            url: '/conversations/{from}/{to}',
            type: 'GET',
            data: { from: currentUser, to: userId },
            success: function (data) {

                $('.messages').html(data);
            }
        });
        
    });
});

</script>