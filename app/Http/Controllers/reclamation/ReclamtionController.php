<?php

namespace App\Http\Controllers\reclamation;

use App\Http\Controllers\Controller;
use App\Models\reclamtion;
use Illuminate\Http\Request;

class ReclamtionController extends Controller
{
//archive
public function index()
{
    $reclamtions = reclamtion::where('archived', 0)->paginate(10); // Remplacez 10 par le nombre d'éléments par page souhaité
    return view('content.Reclamation.Reclamation', compact('reclamtions'));
}

//desarchive
public function indexdesarchive()
  {
    $reclamtions = reclamtion::where('archived', 1)->get();
      return view('content.Reclamation.desarchive', compact('reclamtions'));
  }

  public function indexhI()
  {
       $reclamtions = reclamtion::all();
      return view('Template.historiqueRec', compact('reclamtions'));
  }


  public function indexh()
  {
      if (auth()->check()) { // Vérifie si un utilisateur est authentifié
          $user_id = auth()->user()->id;
          // Récupérer toutes les adresses associées à l'ID de l'utilisateur connecté
          $reclamtions = reclamtion::where('user_id', $user_id)->get();
          return view('Template.historiqueRec', compact('reclamtions'));
      } else {
          // Gérer le cas où l'utilisateur n'est pas authentifié, par exemple, rediriger vers une page de connexion.
          return redirect()->route('login'); // Vous pouvez personnaliser la redirection en fonction de votre application.
      }
  }






  public function create()
  {
    return view('content.Reclamation.reponceReclamation');
  }


  public function store(Request $request)
  {
    {
      $request->validate([
          'nomRec' => 'required|regex:/^[A-Za-z\s]+$/',
          'body' => 'required',
         // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $input = $request->all();
      if ($image = $request->file('image')) {
          $destinationPath = 'img/';
          $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
          $image->move($destinationPath, $productImage);
          $input['image'] = "$productImage";
      }
      reclamtion::create($input);
      return redirect()->route('reclamation')
          ->with('success','Reclamtion created successfully.');
  }
  }


  public function storeF(Request $request)
  {
    {
      $request->validate([
          'nomRec' => 'required|regex:/^[A-Za-z\s]+$/',
          'body' => 'required',
         // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      $user = auth()->user(); // Récupérer l'utilisateur authentifié
      //$input = $request->all();
      if ($image = $request->file('image')) {
          $destinationPath = 'img/';
          $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
          $image->move($destinationPath, $productImage);
          $input['image'] = "$productImage";
      }
      reclamtion::create([
        'nomRec' => $request->input('nomRec'),
        'body' => $request->input('body'),
        'image' => $productImage,
        'user_id' => $user->id, // Assigner l'ID de l'utilisateur connecté
        'statue' => 'En Cours', // Ajout automatique de la valeur "En Cours"
    ]);
      return redirect()->route('historyFR')
          ->with('success','Reclamtion created successfully.');
  }
  }


  public function show(reclamtion $reclamtion)
  {
    return view('content.Reclamation.showR',compact('reclamtion'));
  }

  public function edit(reclamtion $reclamtion)
  {
    return view('content.Reclamation.updateR', compact('reclamtion'));
  }


  public function update(Request $request, reclamtion $reclamtion)
  {
    $request->validate([
      'nomRec' => 'required|alpha',
      'body' => 'required',
      'statue' => 'required|in:traitée,En Cours',
  ]);

   // Mise à jour du champ 'statut' en fonction de la valeur du bouton radio
   $reclamtion->statue = $request->input('statue');

   $reclamtion->update();


  return redirect()->route('reclamation')
      ->with('success','Reclamtion updated successfully.');
  }


  public function editF(reclamtion $reclamtion)
  {
    return view('Template.reclamatioUpdate', compact('reclamtion'));
  }

  public function updateF(Request $request, reclamtion $reclamtion)
  {
    $request->validate([
      'nomRec' => 'required|alpha',
      'body' => 'required',
  ]);

  if ($reclamtion->statue == 'traitée') {
    return redirect()->route('historyFR')->with('error', 'La réclamation est traitée et ne peut pas être modifiée.');
}

  $input = $request->all();
  if ($image = $request->file('image')) {
      $destinationPath = 'img/';
      $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $productImage);
      $input['image'] = "$productImage";
  } else {
      unset($input['image']);
  }

  $reclamtion->update($input);
  return redirect()->route('historyFR')
      ->with('success','Reclamtion updated successfully.');
  }



  public function destroy(reclamtion $reclamtion)
  {
    $reclamtion->delete();
    return redirect()->route('reclamation')
        ->with('success','Reclamtion deleted successfully');
  }

  public function destroyFR(reclamtion $reclamtion)
  {
    $reclamtion->delete();
    return redirect()->route('historyFR')
        ->with('success','Reclamtion deleted successfully');
  }


  public function archive($id)
  {
      $reclamtion = reclamtion::find($id);

      if (!$reclamtion) {
          return redirect()->route('reclamation')->with('error', 'Réclamation non trouvée.');
      }

      // Marquer la réclamation comme archivée
      $reclamtion->archived = 1;
      $reclamtion->save();

      return redirect()->route('reclamation')->with('success', 'Réclamation archivée avec succès.');
  }


  public function desarchive($id)
{
    $reclamtion = reclamtion::find($id);

    if (!$reclamtion) {
        return redirect()->route('reclamationdes')->with('error', 'Réclamation non trouvée.');
    }

    // Marquer la réclamation comme non archivée
    $reclamtion->archived = 0;
    $reclamtion->save();

    return redirect()->route('reclamationdes')->with('success', 'Réclamation désarchivée avec succès.');
}

public function filtrerReclamations(Request $request)
{
    $statue = $request->input('statue');

    $reclamtions = reclamtion::query();

    if ($statue) {
        $reclamtions->where('statue', $statue);
    }

    $reclamtions = $reclamtions->get();

    return view('content.Reclamation.Reclamation', compact('reclamtions'));
}

public function filtree(Request $request)
{
     $statue = $request->input('statue');

    if ($statue === 'En Cours') {
        $reclamtions = reclamtion::where('statue', 'En Cours')->get();
    } elseif ($statue === 'traitée') {
        $reclamtions = reclamtion::where('statue', 'traitée')->get();
    } else {
        $reclamtions = reclamtion::all();
    }

    return view('content.Reclamation.Reclamation', compact('reclamtions'));
}







}
