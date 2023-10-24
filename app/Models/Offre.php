<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'idproduit_a_echanger', // ID du produit à échanger
        'idproduit_pour_echanger_avec', // ID du produit pour lequel l'échange est proposé
        'id_user', // ID de l'utilisateur qui crée l'offre
        'is_confirmed',
    ];

    // Vous pouvez définir les relations avec d'autres modèles ici, par exemple, la relation avec le modèle "User".
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function produitAEchanger()
    {
        return $this->belongsTo(Product::class, 'idproduit_a_echanger', 'id');
    }

    public function produitPourEchanger()
{
    return $this->belongsTo(Product::class, 'idproduit_pour_echanger_avec', 'id');
}

    
}
