<?php

namespace App\Http\Controllers;
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
    public function show(User $user) {
        $currentUser =$this->authManager->user();
        $messages = $this->conversationRepository->getMessagesFor($currentUser->id, $user->id);
        return view('conversations.show', compact('currentUser', 'user', 'messages'));
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
    $messages =$this->conversationRepository->getMessagesFor(1, $request->get('to'))->get();
//    if ($message->sender_id == Auth::user()->id || $message->receiver_id == Auth::user()->id ) {
        return view('conversations.show', [
            'users' => $this->conversationRepository->getConversations($this->authManager->user()->id),  
            'currentUser' => $this->authManager->user(),
            'messages' => $messages,
        ]);
}
}
