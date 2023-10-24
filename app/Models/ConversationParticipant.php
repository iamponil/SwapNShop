<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationParticipant extends Model
{
    use HasFactory;

    protected $table = 'conversation_participants';

    protected $fillable = ['user_id','conversation_id']; // Add 'user_id' to the fillable fields

}
