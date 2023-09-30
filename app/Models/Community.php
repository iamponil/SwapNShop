<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description', 'tags', 'creator_id'];

  public function creator()
  {
    return $this->belongsTo(User::class, 'creator_id');
  }

  public function members()
  {
    return $this->belongsToMany(User::class, 'community_members')->withTimestamps();
  }

  public function events()
  {
    return $this->hasMany(Event::class);
  }
}
