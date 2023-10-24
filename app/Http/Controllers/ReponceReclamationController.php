<?php

namespace App\Http\Controllers;

use App\Models\reponceReclamation;
use Illuminate\Http\Request;
use App\Models\reclamtion;

class ReponceReclamationController extends Controller
{

    public function index()
    {
        //
    }




public function showComments($reclamationId)
{
    $reclamation = reclamtion::findOrFail($reclamationId);
    $comments = $reclamation->reclR; // Récupérez les commentaires de la réclamation
    return view('Template.afficherReponceResponsable', compact('reclamation', 'comments'));
}

    public function showCommentForm($reclamationId)
    {
        $reclamation = reclamtion::findOrFail($reclamationId);
        return view('content.Reclamation.reponceReclamation', compact('reclamation'));
    }

    public function storeComment(Request $request, $reclamationId)
    {

      $request->validate([
        'comment' => 'required',

       // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        $reclamation = reclamtion::findOrFail($reclamationId);
        $comment = new reponceReclamation([
            'contenue' => $request->input('comment'),
            'user_id' => auth()->user()->id, // Assurez-vous que l'utilisateur est authentifié
        ]);

        $reclamation->reclR()->save($comment);

        return redirect()->route('reclamation', $reclamationId); // Redirigez l'utilisateur vers la page de la réclamation
    }







}
