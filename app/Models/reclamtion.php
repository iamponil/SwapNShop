<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamtion extends Model
{
    use HasFactory;

    protected $fillable = [
      'nomRec',
      'body',
      'image',
      "user_id"
    ];
}
