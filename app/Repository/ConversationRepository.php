<?php

namespace App\Repository;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ConversationRepository {


    public function __construct(private User $user,private Message $message) {
    }

    public function getConversations(int $userId) {
  return    $this->user->newQuery()
     ->select('name','id')
     ->where('id','!=',$userId)
     ->get();
    } 
    public function createMessage( $content,int $from,int $to){
   return  $this->message->newQuery()->create([
  'content'=> 'test',
  'sender_id'=>$from,
  'receiver_id' => $to
   ]);
    }
    public function getMessagesFor(int $from, int $to): Builder{
    return  $this->message->newQuery()
      ->whereRaw("((sender_id =$from AND receiver_id=$to) OR (receiver_id=$from AND sender_id=$to))")
      ->orderBy('created_at', 'DESC');
    }
}
