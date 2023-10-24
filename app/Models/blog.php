<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'content',
        'picture',
        'user_id'

    ];
  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

}
