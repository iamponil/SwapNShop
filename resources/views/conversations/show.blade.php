<!DOCTYPE html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="messages">
    <ul>
        @if (isset($messages) &&  count($messages) > 0)
            @foreach ($messages as $message)
            <li class="{{ $message->sender_id === $currentUser->id ? 'sent' : 'replies' }}">
                <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                <div class="message-content-container">
                    <p data-message-id="{{ $message->id }}" class="message-content">{{ $message->content }}</p>
                    <input type="text" class="message-edit-input" data-message-id="{{ $message->id }}" value="{{ $message->content }}" readonly style="display: none;">
                    <span class="message-timestamp">{{ $message->created_at->format('H:i') }}</span>
                
                    @if ($message->sender_id === $currentUser->id)
                    <x-heroicon-o-ellipsis-horizontal class="custom-heroicon" />
                    <div class="message-options-container row" style="display: none;">
                        <ul style="list-style-type: none; padding: 0; margin-left:40px ; display: flex; flex-direction: row;">
                            <li><a href="#" class="edit-message">Edit</a></li>
                            <li><a href="#" class="delete-message" data-message-id="{{ $message->id }}">Delete</a></li>
                        </ul>
                    </div>
                    @endif
                </div>
                
            </li>
            @endforeach
        </ul>
    @else
    @if(isset($receiver))
        <p>No messages to display.</p>
        @endif
    @endif
    <div class="message-input">
        <div class="wrap">
            @if(isset($receiver))
            <form id="message-form" action="{{ route('conversations.sendMessage', ['from' => $currentUser->id, 'to' => $receiver->id]) }}" method="post">
                @csrf <!-- Include the CSRF token field -->

                <input type="text" name="content" value="" placeholder="Write your message..." />
                <button type="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
            @endif
        </div>
</div>

</div>
<script> 
$(document).ready(function () {
    // Add a click event handler to the Heroicon
    $('.custom-heroicon').click(function (e) {
        // Prevent the default behavior of the Heroicon (if any)
        e.preventDefault();

        // Toggle the visibility of the options container
        $(this).next('.message-options-container').toggle();
    });
    $('.edit-message').click(function (e) {
        e.preventDefault();

        // Find the message content and input field based on data attributes
        var messageId = $(this).closest('.message-options-container').find('a.delete-message').data('message-id');
        var messageContent = $(`.message-content[data-message-id="${messageId}"]`);
        var editInput = $(`.message-edit-input[data-message-id="${messageId}"]`);

        // Toggle between read-only and editable modes
        messageContent.hide();
        editInput.show().prop('readonly', false).focus();

        // Add event listener to the input field for the "Enter" key
        editInput.keydown(function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();

                // When "Enter" is pressed, trigger the update process (you can use an AJAX request here)
                var updatedMessage = editInput.val();
                updateMessageInDatabase(messageId, updatedMessage);

                // Hide the input field after updating
                editInput.hide();
                messageContent.text(updatedMessage).show();
            }
        });
    });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $('.delete-message').on('click', function() {
    var messageId = $(this).data('message-id');
    
    $.ajax({
        url: '/conversations/delete-message/' + messageId, // Update the URL to your route
        type: 'DELETE',
        success: function(data) {
            // Handle success, e.g., remove the message from the UI
            $(`[data-message-id=${messageId}]`).closest('li').remove();
        },
        error: function(data) {
            // Handle errors, if needed
            console.error(data);
        }
    });
});	
function updateMessageInDatabase(messageId, updatedMessage) {
        // Example AJAX request to update the message
        $.ajax({
            url: '/update-message', // Replace with your update endpoint
            type: 'POST',
            data: {
                messageId: messageId,
                updatedMessage: updatedMessage
            },
            success: function (data) {
                // Handle success response (e.g., show a success message)
                console.log('Message updated successfully');
            },
            error: function (error) {
                // Handle error response (e.g., show an error message)
                console.error('Error updating message:', error);
            }
        });
    }
});
</script>
</body>
</html>