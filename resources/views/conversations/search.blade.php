@foreach ($searchedUsers as $user)
<li class="contact" id="user-{{ $user->id }}">
    <div class="wrap">
        <span class="contact-status online"></span>
        <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
        <div class="meta">
            <!-- Add a data attribute with user ID to each list item -->
            <p class="name" data-user-id="{{ $user->id }}">{{ $user->name }}</p>
        </div>
    </div>
</li>
@endforeach