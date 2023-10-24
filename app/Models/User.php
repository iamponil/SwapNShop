<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\reclamtion;
use App\Models\reponceReclamation;
use App\Models\BlogCommentaire;
use App\Models\Product;
use App\Models\AdresseLivraison;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
  
    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

   public function reclamations()
   {
       return $this->hasMany(Reclamtion::class,'user_id');
   }
   public function reponse()
   {
       return $this->hasMany(reponceReclamation::class,'user_id');
   }

   public function comments()
    {
        return $this->hasMany(BlogCommentaire::class,'user_id');
    }

    // app/User.php

public function wishlist()
{
    return $this->belongsToMany(Product::class, 'wishlist', 'user_id', 'product_id');
}

     public function adresses()
     {
         return $this->hasMany(AdresseLivraison::class);
     }
}
