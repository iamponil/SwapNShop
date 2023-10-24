<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;

use Illuminate\Http\Request;

class WishlistController extends Controller
{   
    public function index()
{
    $user = auth()->user();
    $likedProducts = $user->wishlist->pluck('product_id')->toArray();

    return response()->json(['likedProducts' => $likedProducts]);
}
  public function showWishlist()
{
    $user = auth()->user();
    $wishlistProducts = $user->wishlist;

    return response()->json(['success' => true, 'wishlistProducts' => $wishlistProducts]);
}

    public function toggleProduct(Request $request)
    {
        $productId = $request->input('product_id');
        $user = auth()->user();
        
        // Use toggle to add or remove the specific product from the wishlist
        $user->wishlist()->toggle($productId);
    
        // Check if the product is currently wishlisted
        $added = $user->wishlist->contains($productId);
    
        return response()->json(['success' => true, 'added' => $added]);
    }
    
   
     
}

