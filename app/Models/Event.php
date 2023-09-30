<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'description', 'date_time', 'location', 'community_id'];

  public function community()
  {
    return $this->belongsTo(Community::class);
  }

  public function attendees()
  {
    return $this->belongsToMany(User::class, 'event_attendees')->withTimestamps();
  }
}
