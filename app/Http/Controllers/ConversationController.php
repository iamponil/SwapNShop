<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Conversation;

use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;

class ConversationController extends Controller
{


    public function __construct(private ConversationRepository $conversationRepository,private AuthManager $authManager){}
    public function index (){
        
return view ('conversations/index',[
    'conversations' => $this->conversationRepository->getConversations($this->authManager->user()->id),  
    'currentUser'=>$this->authManager->user(),
]);
    }
    public function show(User $user)
    {
        $currentUser = $this->authManager->user();
    
      //  $messages = $this->conversationRepository->getMessagesFor($currentUser->id, $user->id);
    
        return view('conversations.show', compact('currentUser', 'user'));
    }


    public function searchConversation(Request $request)
    {
        $searchText = $request->input('searchText');
        $currentUserId = $this->authManager->user()->id;
    
        try {
            $conversations = Conversation::select('conversations.*')
                ->join('conversation_participants', 'conversation_participants.conversation_id', '=', 'conversations.id')
                ->where('conversations.name', 'like', '%' . $searchText . '%')
                ->where('conversation_participants.user_id', $currentUserId)
                ->get();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    
        return view('conversations.search', ['searchedConversation' => $conversations]);
    }
    

  public function store (Request $request, User $user){
    $this->conversationRepository->createMessage(
        $request->get('content'),
        $this->authManager->user()->id,
        $user->id
    );
    return redirect(route('conversations', ['user' => $user->id]));
}


public function getMessagesBetweenUsers(Request $request)
{
    $messages =$this->conversationRepository->getMessagesFor($request->get('from'), $request->get('to'))->get();
        return view('conversations.show', [
            'users' => $this->conversationRepository->getConversations($this->authManager->user()->id),  
            'currentUser' => $this->authManager->user(),
            'messages' => $messages,
            'receiver' => User::find($request->get('to')),

        ]);
}

public function sendMessage(Request $request, $from, $to)
{
    // Validate the request
    $request->validate([
        'content' => 'required|string|max:255',
    ]);

    // Create a new message and save it to the database
    $message = $this->conversationRepository->createMessage($request->input('content'), $from, $to);

    // Retrieve additional data for the message, such as timestamp and buttons
    $timestamp = $message->created_at->format('H:i');
   
    // Return a JSON response with the message data
    return response()->json([
        'message' => $message->content,
        'timestamp' => $timestamp,
        'message_id' => $message->id,
    ]);
}
public function deleteMessage($messageId)
{
    $message = Message::find($messageId);

    if ($message->sender_id === auth()->user()->id) {
        $message->delete();
        return response()->json(['message' => 'Message deleted successfully']);
    }

    return response()->json(['error' => 'Permission denied'], 403);
}
public function update(Request $request)
{
    $messageId = $request->input('messageId');
    $updatedMessage = $request->input('updatedMessage');

    // Assuming you have an Eloquent model named 'Message'
    $message = Message::find($messageId);

    if (!$message) {
        return response()->json(['message' => 'Message not found'], 404);
    }

    // Update the message content
    $message->content = $updatedMessage;
    $message->save();

    return response()->json(['message' => 'Message updated successfully']);
}
public function messageItem(Request $request, $message, $timestamp, $messageId)
{
    // Pass the parameters to the view and render it
    $viewData = [
        'message' => $message,
        'timestamp' => $timestamp,
        'message_id' => $messageId,
    ];

    // Render the view and return it as HTML in the response
    $messageItemHtml = view('conversations.message_item', $viewData)->render();

    return response()->json(['messageItemHtml' => $messageItemHtml]);
}
}
