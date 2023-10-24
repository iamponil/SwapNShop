<?php

namespace App\Http\Controllers;
use App\Models\AdresseLivraison;

use App\Models\User;
use Illuminate\Http\Request;

class AdresseLivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     // $adresse = AdresseLivraison::all();
      //return view('Template.adresselivraison', compact('adresse'));
    }

    public function showDeliveryAddresses()
    {
        if (auth()->check()) { // Vérifie si un utilisateur est authentifié
            $user_id = auth()->user()->id;
            // Récupérer toutes les adresses associées à l'ID de l'utilisateur connecté
            $adresse = AdresseLivraison::where('user_id', $user_id)->get();
            return view('Template.adresselivraison', compact('adresse'));
        } else {
            // Gérer le cas où l'utilisateur n'est pas authentifié, par exemple, rediriger vers une page de connexion.
            return redirect()->route('login'); // Vous pouvez personnaliser la redirection en fonction de votre application.
        }
    }



    public function create()
    {
      return view('Template.addAdresselivraison');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      {
        $request->validate([
            'nom'=> 'required|alpha',
            'prenom'=> 'required|alpha',
            'ville'=> 'required',
            'codepostal'=> 'required|numeric',
            'Adressecomp'=> 'required',
            'tel' => 'required|numeric|digits:8',
        ]);


        $user = auth()->user(); // Récupérer l'utilisateur authentifié
        AdresseLivraison::create([
          'nom' => $request->input('nom'),
          'prenom' => $request->input('prenom'),
          'ville' => $request->input('ville'),
          'pays' => $request->input('pays'),
          'codepostal' => $request->input('codepostal'),
          'Adressecomp' => $request->input('Adressecomp'),
          'tel' => $request->input('tel'),
          'user_id' => $user->id, // Assigner l'ID de l'utilisateur connecté
      ]);
        return redirect()->route('AdrresseLivraison')
            ->with('success','Adresse Livraison created successfully.');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdresseLivraison  $adresseLivraison
     * @return \Illuminate\Http\Response
     */
    public function show(AdresseLivraison $adresseLivraison)
    {
        //
    }


    public function edit(AdresseLivraison $adresseLivraison)
    {
      return view('Template.updateAdreseLivraison', compact('adresseLivraison'));
    }

    public function update(Request $request, AdresseLivraison $adresseLivraison)
    {
      {
        $request->validate([
            'nom'=> 'required|alpha',
            'prenom'=> 'required|alpha',
            'ville'=> 'required',
            'codepostal'=> 'required|numeric',
            'Adressecomp'=> 'required',
            'tel' => 'required|numeric|digits:8',
        ]);


    $input = $request->all();


    $adresseLivraison->update($input);
    return redirect()->route('AdrresseLivraison')
        ->with('success','Adresse Livraison updated successfully.');
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdresseLivraison  $adresseLivraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdresseLivraison $adresseLivraison)
    {
      $adresseLivraison->delete();
      return redirect()->route('AdrresseLivraison')
          ->with('success','Adresse Livraison deleted successfully');
    }
}
