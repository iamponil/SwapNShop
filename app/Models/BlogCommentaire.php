<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class BlogCommentaire extends Model
{
    use HasFactory;
    protected $fillable=[
      'id',
      'blog_id',
      'comment',
      'user_id'
  ];
  public function blog()
  {
      return $this->belongsTo(User::class, 'user_id');
  }
  public function commenttt()
  {
      return $this->belongsTo(blog::class, 'blog_id');
  }
}
