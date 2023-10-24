<?php

namespace App\Http\Controllers;

use App\Models\Echanges;
use App\Models\Offre;
use Illuminate\Http\Request;

class EchangeController extends Controller
{
    public function confirmEchange($offreId)
    {
        // Obtenez l'ID de l'utilisateur connecté
        $userId = auth()->user()->id;  // Assurez-vous que vous utilisez l'authentification Laravel
    
        // Vérifiez si l'offre avec l'ID spécifié existe
        $offre = Offre::find($offreId);
    
        if (!$offre) {
            // L'offre n'existe pas, vous pouvez afficher un message d'erreur
            return response()->json(['success' => false, 'message' => 'L\'offre spécifiée n\'existe pas.']);
        }
        // Vérifiez si l'offre a déjà été confirmée
    if ($offre->is_confirmed) {
        return response()->json(['success' => false, 'message' => 'L\'offre a déjà été confirmée.']);
    }
    // Définissez is_confirmed sur true
    $offre->is_confirmed = true;
    $offre->save(); // Sauvegardez l'offre avec la valeur mise à jour de is_confirmed

        // L'offre existe, vous pouvez créer un nouvel enregistrement dans la table "echanges"
        Echanges::create([
            'id_offre_confirme' => $offre->id,
            'id_user' => $userId,
        ]);
    
        // Retournez une réponse JSON pour indiquer le succès
        return response()->json(['success' => true]);
    }
    

}