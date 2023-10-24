<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echanges extends Model
{
    protected $table = 'echanges'; // Nom de la table dans la base de données

    protected $fillable = [
        'id_offre_confirme',
        'id_user',
        'id_livraison',
    ];

    // Relations avec d'autres modèles
    public function offreConfirme()
    {
        return $this->belongsTo(Offre::class, 'id_offre_confirme');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    //livraison feha l many************************

    // Ajoutez la relation vers la table "livraisons" une fois qu'elle est créée

  public function livraisons()
  {
    return $this->belongsTo(Livraison::class, 'id_livraison');
  }

    // Autres méthodes ou propriétés du modèle Echange
}
