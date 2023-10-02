<div class="messages">
   <ul>
    @if (isset($messages) && count($messages) > 0)
  
            @foreach ($messages as $message)
        

            
                        <li class="{{ $message->sender_id === $currentUser->id ? 'sent' : 'replies' }}">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>{{ $message->content }}</p>
                        </li>
                
            @endforeach
        </ul>
    @else
    <p>No messages to display.</p>
    @endif
    <div class="message-input">
        <div class="wrap">
            <input type="text" placeholder="Write your message..." />
            <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
            <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
    </div>
</div>

