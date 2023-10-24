<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationEmail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;


class EmailController extends Controller
{
    public function sendConfirmationEmail(Request $request, $userId, $productId) {
        // Vous pouvez récupérer l'utilisateur et les détails du produit ici
        // Puis envoyez l'e-mail en utilisant le service Mail
    
        $user = User::find($userId);
        $product = Product::find($productId);
    
        // N'ajoutez pas l'adresse e-mail ici, car vous l'avez déjà définie dans le fichier .env
    
        Mail::to($user->email)->send(new ConfirmationEmail($user, $product));
    
        // return view('Template.product');
    }
     // Méthode pour rediriger vers Google pour l'autorisation
     public function redirectToGoogle()
     {
         return Socialite::driver('google')->redirect();
     }
 
     // Méthode pour gérer la réponse de Google après autorisation
     public function handleGoogleCallback()
     {
         $user = Socialite::driver('google')->user();
         $accessToken = $user->token;
 
         // Utilisez $accessToken pour envoyer des e-mails via Gmail
     }
    
}
