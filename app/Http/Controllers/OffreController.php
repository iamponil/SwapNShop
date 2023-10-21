<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         if (Auth::check()) {
        // Récupérez les données du formulaire AJAX
        $idproduit_a_echanger= $request->input('id_produit_a_echanger');
        $idproduit_pour_echanger_avec = $request->input('id_produit_pour_echanger_avec');

        // Créez une nouvelle offre
        $offre = new Offre();
        $offre->idproduit_a_echanger = $idproduit_a_echanger;
        $offre->idproduit_pour_echanger_avec= $idproduit_pour_echanger_avec;
        $offre->id_user = Auth::user()->id;
        
        $offre->save();

        // Vous pouvez également envoyer un e-mail ici si nécessaire

        return response()->json(['message' => 'Offre créée avec succès']);
    } 
    else {
        return response()->json(['error' => 'L\'utilisateur n\'est pas authentifié'], 401);
    }
}
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function getProductOffers($productId)
{
    // Récupérez les offres pour le produit avec $productId
    $offers = Offre::where('idproduit_pour_echanger_avec', $productId)
    ->with('user', 'produitAEchanger', 'produitPourEchanger')
    ->get();
    // Renvoyez les offres en tant que réponse JSON
    return response()->json(['offers' => $offers]);
    
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteByProduct(Request $request, $productId)
    {
        // Supprimez toutes les offres liées à ce produit
        Offre::where('idproduit_a_echanger', $productId)->delete();
    
        // Retournez une réponse JSON pour indiquer le succès
        return response()->json(['success' => true]);
    }
    
}
