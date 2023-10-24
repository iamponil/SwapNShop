<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class reclamtion extends Model
{
    use HasFactory;

    protected $fillable = [
      'nomRec',
      'body',
      'image',
      'statue',
      'user_id',
    ];

    // Relation avec l'utilisateur


    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
