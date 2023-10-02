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
]);
    }

    public function show (User $user){
        return view ('conversations/show',[
            'users' => $this->conversationRepository->getConversations($this->authManager->user()->id),
             'user'=> $user
        ]);
    }
}
