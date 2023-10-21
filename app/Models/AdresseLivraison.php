<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class AdresseLivraison extends Model
{
    use HasFactory;

    protected $fillable = [
      'nom',
      'prenom',
      'ville',
      "pays",
      'codepostal',
      'Adressecomp',
      'tel',
      'user_id',
    ];

      // Relation avec l'utilisateur
      public function user()
      {
          return $this->belongsTo(User::class);
      }
}
