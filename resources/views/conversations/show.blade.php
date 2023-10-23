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
                    
                        {{-- <i class="fa fa-trash"></i> --}}
                    <div class="message-options-container row" style="display: none;">
                        <ol style="list-style-type: none; padding: 0; margin-left:40px ; display: flex; flex-direction: row;">
                            <li><a style="color: blue" class="fa fa-pencil edit-message"></a></li>
                            <li><a style="color: red" class="fa fa-trash delete-message" data-message-id="{{ $message->id }}"></a></li>
                        </ol>
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
            <form id="message-form" data-receiver="{{ $receiver->id }}">
                @csrf <!-- Include the CSRF token field -->
                <input type="text" id="content" name="content" value="" placeholder="Write your message..." />
                <button type="button" id="submit-message" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
            @endif
        </div>
    </div>
<script> 
$(document).ready(function () {
    $('#submit-message').click(function() {
        sendMessage();
    });

    $('.message-input input').on('keydown', function (e) {
        if (e.which === 13 && !e.shiftKey) { // Check if Enter key is pressed without Shift
            e.preventDefault(); // Prevent the default Enter key behavior (e.g., adding new lines)
            sendMessage();
        }
    });

    // Function to send a new message asynchronously
    function sendMessage() {
        var content = $('#content').val();
        var receiverId = $('#message-form').data('receiver');
        var fromUserId = {{ $currentUser->id }};

        $.ajax({
            type: 'POST',
            url: '{{ route('conversations.sendMessage', ['from' => ':from', 'to' => ':to']) }}'
                .replace(':from', fromUserId)
                .replace(':to', receiverId),
            data: {
                _token: '{{ csrf_token() }}',
                content: content,
                receiver_id: receiverId
            },
            success: function(response) {
                // Fetch the rendered message item HTML using an AJAX request
                $.ajax({
                    type: 'GET',
                    url: '{{ route('message_item', ['message' => ':message', 'timestamp' => ':timestamp', 'message_id' => ':message_id']) }}'
                        .replace(':message', response.message)
                        .replace(':timestamp', response.timestamp)
                        .replace(':message_id', response.message_id),
                    success: function(response) {
                        console.log(response);
                        // Append the new message item to the message list
                        $(response.messageItemHtml).appendTo($('.messages ul'));
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                $('#content').val('');
                $(".messages").animate({ scrollTop: $(document).height() }, "fast");
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
});

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
function newMessage() {
    message = $(".message-input input").val();
    if ($.trim(message) == '') {
        return false;
    }

    // Append the new message to the message list
    $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));

    // Clear the message input field
    $('.message-input input').val('');

    // Scroll to the bottom of the message list
    $(".messages").animate({ scrollTop: $(document).height() }, "fast");

    // You can add AJAX logic to send the message to the server here
}

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
</script>
</body>
</html>