<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{

protected $fillable = [
  'type_methode_paiement',
  'numero_compte',
  'titulaire_methode_paiement',
  'date_expiration',
  'adresse_facturation',
  'user_id',
  // Add other fields as needed
];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
