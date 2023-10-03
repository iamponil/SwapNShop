<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'sender_id',
        'receiver_id',
        'created_at'
      ];
    public function from() {
return $this->belongsTo(User::class,'sender_id');
    }
    public function to() {
        return $this->belongsTo(User::class,'receiver_id');
            }
}
