<!-- resources/views/message_item.blade.php -->
<li class="sent">
    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
    <div class="message-content-container-two">
        <p data-message-id-two="{{ $message_id }}" class="message-content-two">{{ $message }}</p>
        <input type="text" class="message-edit-input-two" data-message-id-two="{{ $message_id }}" value="{{ $message }}" readonly style="display: none;">
    <span class="message-timestamp">{{ $timestamp }}</span>
    <x-heroicon-o-ellipsis-horizontal class="custom-heroicon" />
    <div class="message-options-container-two row" style="display: none;">
        <ol style="list-style-type: none; padding: 0; margin-left: 40px; display: flex; flex-direction: row;">
            <li><a style="color: blue" class="fa fa-pencil edit-message-two"></a></li>
            <li><a style="color: red" class="fa fa-trash delete-message-two" data-message-id-two="{{ $message_id }}"></a></li>
        </ol>
    </div>
    </div>
</li>
<script>
    
     $('.custom-heroicon').click(function (e) {
        // Prevent the default behavior of the Heroicon (if any)
        e.preventDefault();

        // Toggle the visibility of the options container
        $(this).next('.message-options-container-two').toggle();
    });
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $('.delete-message-two').on('click', function() {
    var messageId = $(this).data('message-id-two');
    
    $.ajax({
        url: '/conversations/delete-message/' + messageId, // Update the URL to your route
        type: 'DELETE',
        success: function(data) {
            // Handle success, e.g., remove the message from the UI
            $(`[data-message-id-two=${messageId}]`).closest('li').remove();
        },
        error: function(data) {
            // Handle errors, if needed
            console.error(data);
        }
    });
});	
$('.edit-message-two').click(function (e) {
        e.preventDefault();

        // Find the message content and input field based on data attributes
        var messageId = $(this).closest('.message-options-container-two').find('a.delete-message-two').data('message-id-two');
        var messageContent = $(`.message-content-two[data-message-id-two="${messageId}"]`);
        var editInput = $(`.message-edit-input-two[data-message-id-two="${messageId}"]`);
        // Toggle between read-only and editable modes
        messageContent.hide();
        editInput.show().prop('readonly', false).focus();

        // Add event listener to the input field for the "Enter" key
        editInput.keydown(function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();

                // When "Enter" is pressed, trigger the update process (you can use an AJAX request here)
                var updatedMessage = editInput.val();
                updateMessageInDatabaseTwo(messageId, updatedMessage);

                // Hide the input field after updating
                editInput.hide();
                messageContent.text(updatedMessage).show();
            }
        });
    });
function updateMessageInDatabaseTwo(messageId, updatedMessage) {
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
