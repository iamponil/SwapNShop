<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraisonnn extends Model
{
  use HasFactory;

  protected $fillable = ['Id_echange',
    'Id_adresse_livraison',
    'Id_user',
    'Date_envoi',
    'Statut'
  ];

  public function echange()
  {
    return $this->hasMany(Echanges::class, 'id_livraison');
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
