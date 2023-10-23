<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'description',
        'category',
        'location',
        'price',
        'order',
        'image',
        'user_id'
    ];
  public function creator()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

}
