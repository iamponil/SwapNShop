<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\Offre;
use App\Models\Product;
use App\Repository\ConversationRepository;
use GuzzleHttp\Promise\Promise;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
public function createOrFindConversation( $userId, $productId, $offreId)
{
    // Get the current user's ID
    $currentUser = auth()->user();
    
    // Check if a conversation already exists between these two users in the `conversation_participants` table
    $conversation = ConversationParticipant::select('conversation_id')
    ->where(function ($query) use ($currentUser, $userId) {
        $query->where('user_id', $currentUser->id)
              ->orWhere('user_id', $userId);
    })->groupBy('conversation_id')
      ->havingRaw('COUNT(*) = 2') // Make sure both users are in the same conversation
      ->first();
      $productName = Product::find($productId)->product_name;
      $offre_to_exchange = Offre::find($offreId)->idproduit_a_echanger;

      $offerName = Product::find($offre_to_exchange)->product_name;
      $conversationName = $productName . ' exchange ' . $offerName;
    
    // If no conversation exists, create a new conversation in the `conversations` table

    if (!$conversation) {

        DB::beginTransaction();

        try {
            $conversation = Conversation::create([
                'name' => $conversationName,
            ]);
        
            $conversationId = $conversation->id;
        
            ConversationParticipant::create([
                'user_id' => $userId,
                'conversation_id' => $conversationId,
            ]);
        
            ConversationParticipant::create([
                'user_id' => auth()->id(),
                'conversation_id' => $conversationId,
            ]);
        
            DB::commit(); // All changes are saved if this line is reached
        } catch (\Exception $e) {
            DB::rollBack(); // Something went wrong, so we roll back the changes
            // Handle the exception as needed
        }

    // Redirect to the conversation
    return redirect()->route('conversations.show', ['user' => $conversationId]);
}

}
public function translateMessage(Request $request)
{
    // Get the message, source language, and target language from the request
    $message = $request->input('message');
    $sourceLanguage = $request->input('source');
    $targetLanguage = $request->input('target');

    // Make a request to the Google Translate API
    $response = Http::post('https://google-translate1.p.rapidapi.com/language/translate/v2', [
        'form_params' => [
            'q' => $message,
            'target' => $targetLanguage,
            'source' => $sourceLanguage,
        ],
        'headers' => [
            'Accept-Encoding' => 'application/gzip',
            'X-RapidAPI-Host' => 'google-translate1.p.rapidapi.com',
            'X-RapidAPI-Key' => 'a68f0c02b5msha97ea6e56a40a38p19f9b1jsn2f8d55fcb73b',
            'content-type' => 'application/x-www-form-urlencoded',
        ],
    ]);
    dd($response);

    // Check if the translation request was successful
    if ($response->successful()) {
        // Parse the response JSON to get the translated message
        $translatedMessage = $response->json()['data']['translations'][0]['translatedText'];

        // Return the translated message as JSON
        return response()->json(['translatedMessage' => $translatedMessage]);
    } else {
        // Handle errors if the translation request fails
        return response()->json(['error' => 'Translation failed'], 500);
    }
}
}