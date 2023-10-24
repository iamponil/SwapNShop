@foreach ($searchedConversation as $conversation)
<li class="contact" id="user-{{ $conversation->id }}">
    <div class="wrap">
        <span class="contact-status online"></span>
        <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
        <div class="meta">
            <!-- Add a data attribute with user ID to each list item -->
            <p class="name" data-user-id="{{ $conversation->id }}">{{ $conversation->name }}</p>
        </div>
    </div>
</li>
@endforeach