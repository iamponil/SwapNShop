<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $fillable = [
    'montant',
    'date_heure_paiement',
    'methode_paiement',
    'statut_paiement',
    'user_id',
    // 'commande_id',
    // Add other fields as needed
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }


}
