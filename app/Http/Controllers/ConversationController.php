<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;

class ConversationController extends Controller
{


    public function __construct(private ConversationRepository $conversationRepository,private AuthManager $authManager){}
    public function index (){
return view ('conversations/index',[
    'users' => $this->conversationRepository->getConversations($this->authManager->user()->id),  
    'currentUser'=>$this->authManager->user(),
]);
    }
    public function show(User $user)
    {
        $currentUser = $this->authManager->user();
    
      //  $messages = $this->conversationRepository->getMessagesFor($currentUser->id, $user->id);
    
        return view('conversations.show', compact('currentUser', 'user'));
    }


    public function searchUsers(Request $request)
{
    $searchText = $request->input('searchText');

    try {
        $users = User::where('name', 'like', '%' . $searchText . '%')
        ->where('id', '!=', $this->authManager->user()->id)
        ->get();
        } catch (\Exception $e) {
        dd($e->getMessage());
    }
        
    return view('conversations/search', ['searchedUsers' => $users]);
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
//    if ($message->sender_id == Auth::user()->id || $message->receiver_id == Auth::user()->id ) {
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
    $this->conversationRepository->createMessage($request->input('content'), $from, $to);

    // Redirect back to the conversation view
    return redirect()->route('conversations', ['user' => $to]);
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
}
