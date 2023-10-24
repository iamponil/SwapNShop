<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reponceReclamation extends Model
{
    use HasFactory;
    protected $fillable = [
   'reclamation_id',
      'contenue',
      'user_id',
    ];


    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function reponseR()
{
    return $this->belongsTo(reclamtion::class, 'reclamation_id');
}

}
