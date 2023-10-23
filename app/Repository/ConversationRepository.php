<?php

namespace App\Repository;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ConversationRepository {


    public function __construct(private User $user,private Message $message) {
    }

    public function getConversations(int $userId) {
      $conversations = DB::table('conversations')
          ->join('conversation_participants as cp1', 'conversations.id', '=', 'cp1.conversation_id')
          ->join('users as current_user', 'cp1.user_id', '=', 'current_user.id')
          ->join('conversation_participants as cp2', 'conversations.id', '=', 'cp2.conversation_id')
          ->join('users as other_user', 'cp2.user_id', '=', 'other_user.id')
          ->select(
              'conversations.id as conversation_id',
              'conversations.name as conversation_name',
              'current_user.name as current_user_name',
              'current_user.id as current_user_id',
              'other_user.name as other_user_name',
              'other_user.id as other_user_id'
          )
          ->where('cp1.user_id', $userId)
          ->where('cp2.user_id', '!=', $userId)
          ->get();
      return $conversations;
  }
  
    public function createMessage( $content,int $from,int $to){
   return  $this->message->newQuery()->create([
  'content'=> $content,
  'sender_id'=>$from,
  'receiver_id' => $to
   ]);
    }
    public function getMessagesFor(int $from, int $to): Builder{
    return  $this->message->newQuery()
      ->whereRaw("((sender_id =$from AND receiver_id=$to) OR (receiver_id=$from AND sender_id=$to))")
      ->orderBy('created_at', 'ASC');
    }
}
