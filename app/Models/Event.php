<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'description', 'date_time', 'location', 'community_id','creator_id'];
  protected $dates = ['date_time'];


  public function community()
  {
    return $this->belongsTo(Community::class);
  }

  public function attendees()
  {
    return $this->belongsToMany(User::class, 'event_attendees')->withTimestamps();
  }
  public function creator()
  {
    return $this->belongsTo(User::class, 'creator_id');
  }
}
