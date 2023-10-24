<?php

namespace App\Http\Controllers;

use App\Models\AdresseLivraison;
use App\Models\Echanges;
use App\Models\Event;
use App\Models\Livraisonnn;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;


class LivraisonnnController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $livraison = Livraisonnn::join('users', 'livraisonnns.Id_user', '=', 'users.id')
    ->join('adresse_livraisons', 'livraisonnns.Id_adresse_livraison', '=', 'adresse_livraisons.id')
    ->select('livraisonnns.*', 'users.name as userName', 'adresse_livraisons.Adressecomp as adresseComp')
    ->get();
        return view('content.livraison.livraison', compact('livraison'));
    }
    
   


  /**
   * @param Request $request
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
   */
  public function updateStatus(Request $request, $id)
  {
    $livraisonnn = Livraisonnn::find($id);

    $livraisonnn->update([
      'Statut' => $request->get('status'),
    ]);
    $livraison = Livraisonnn::all();
    return view('content.livraison.livraison', compact('livraison'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::all();
    $adressesLivraison = AdresseLivraison::all();
    $echanges = Echanges::all();

    return view('content.livraison.create', compact('users', 'adressesLivraison', 'echanges'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'Id_user' => 'required',
      'Id_adresse_livraison' => 'required',
      'Id_echange' => 'required',
      'Date_envoi' => 'required',
      'Statut' => 'required',
    ]);

    Livraisonnn::create($request->all());

    return redirect()->route('showLivraison')
      ->with('success', 'Livraison ajoutée avec succès.');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function createview()
  {
    return view('content.livraison.create');
  }


  /**
   * Display the specified resource.
   *
   * @param \App\Models\Livraisonnn $livraisonnn
   * @return \Illuminate\Http\Response
   */
  public
  function show(Livraisonnn $livraisonnn)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Livraisonnn $livraisonnn
   * @return \Illuminate\Http\Response
   */
  public
  function edit(Livraisonnn $livraisonnn)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Livraisonnn $livraisonnn
   * @return \Illuminate\Http\Response
   */
  public
  function update(Request $request, Livraisonnn $livraisonnn)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Livraisonnn $livraisonnn
   * @return \Illuminate\Http\Response
   */
  public function destroy(Livraisonnn $livraisonnn)
  {
    //
  }

  public function pdf(){
    
    $livraison = Livraisonnn::join('users', 'livraisonnns.Id_user', '=', 'users.id')
    ->join('adresse_livraisons', 'livraisonnns.Id_adresse_livraison', '=', 'adresse_livraisons.id')
    ->select('livraisonnns.*', 'users.name as userName', 'adresse_livraisons.Adressecomp as adresseComp')
    ->get()->toArray();

    view()->share('livraison', $livraison);
    
    $pdf = PDF::loadView('pdf', $livraison);   
    
    return $pdf->download('livraison.pdf');
}
}
