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
        'picture'

    ];
    public function commentsss()
    {
        return $this->hasMany(BlogCommentaire::class,'blog_id');
    }

}
