<?php

namespace App\Repository;

use App\Models\User;

class ConversationRepository {


    public function __construct(private User $user) {
    }

    public function getConversations(int $userId) {
  return    $this->user->newQuery()
     ->select('name','id')
     ->where('id','!=',$userId)
     ->get();
    } 
}
