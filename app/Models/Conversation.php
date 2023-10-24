<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
  use HasFactory;

  protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'conversation_user');
    }
    public function participants()
{
    return $this->belongsToMany(User::class, 'conversation_participants', 'conversation_id', 'user_id');
}
    

}
